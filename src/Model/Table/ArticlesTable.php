<?php
declare(strict_types=1);

namespace App\Model\Table;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;

class ArticlesTable extends Table
{
    public function intialize(array $config): void
    {
        $this -> addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
    {
        if ($entity->isNew() && $entity->get('title')) {
            $slug = Text::slug($entity->get('title'));
            $slug = strtolower($slug);

            // Check if the slug already exists and append a unique suffix if needed
            $count = 0;
            while ($this->exists(['slug' => $slug])) {
                $count++;
                $slug = Text::slug($entity->get('title')) . '-' . $count;
            }
            $entity->set('slug', $slug);
        }
    }
}
