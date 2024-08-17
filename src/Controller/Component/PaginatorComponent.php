<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\RepositoryInterface;
use Cake\Http\Exception\NotFoundException;

/**
 * PaginatorComponent class
 *
 * A custom paginator component that allows paginating query results.
 */
class PaginatorComponent extends Component
{
    /**
     * Paginate query results.
     *
     * @param \Cake\Datasource\RepositoryInterface|\Cake\ORM\Query $object The query or repository object to paginate.
     * @param array $settings Settings to use for pagination.
     * @return \Cake\Datasource\ResultSetInterface The paginated results.
     * @throws \Cake\Http\Exception\NotFoundException When the page number is out of bounds.
     */
    public function paginate($object, array $settings = [])
    {
        // Get the request from the controller
        $controller = $this->getController();
        $request = $controller->getRequest();

        try {
            // Use the built-in paginate method of the controller
            return $controller->paginate($object, $settings);
        } catch (NotFoundException $e) {
            // Handle the case where the requested page is out of bounds
            throw new NotFoundException(__('Page not found.'));
        }
    }
}
