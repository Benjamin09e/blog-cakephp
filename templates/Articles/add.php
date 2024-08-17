<h1>Add Article</h1>

<?php
    // Crée le formulaire pour l'article
    echo $this->Form->create($article);

    // Champ caché pour l'user_id avec une valeur par défaut de 1
    echo $this->Form->control('user_id', [
        'type' => 'hidden',
        'value' => 1,
    ]);

    // Champ pour le titre de l'article
    echo $this->Form->control('title', [
        'label' => 'Title of the Article',
        'placeholder' => 'Enter the title here',
    ]);

    // Champ pour le corps de l'article avec une taille personnalisée
    echo $this->Form->control('body', [
        'label' => 'Article Content',
        'rows' => '3',
        'placeholder' => 'Write your article content here...',
    ]);

    // Bouton pour soumettre le formulaire
    echo $this->Form->button('Save Article', [
        'class' => 'btn btn-primary',
    ]);

    // Ferme le formulaire
    echo $this->Form->end();
    ?>
