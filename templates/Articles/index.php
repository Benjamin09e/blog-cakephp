<h1>Articles</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Created</th>
    </tr>
    <?php foreach ($articles as $article) : ?>
    <tr>
        <td><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></td>
        <td><?= h($article->body) ?></td>
        <td>
            <?php if ($article->created !== null) : ?>
                <?= h($article->created->format('Y-m-d H:i:s')) ?>
            <?php else : ?>
                <em>Date not available</em>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<!-- Pagination links -->
<?= $this->Paginator->numbers() ?>
