<h1><?= h($article->body) ?></h1>
<p><?= h($article->body) ?></p>
<p><small><?= h($article->created ->format(DATE_RFC850)) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $article ->slug]) ?></p>
