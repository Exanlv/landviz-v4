<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<div class="mb-5">
    <h1 class="text-center"><?= $category_name ?></h1>

    <?php if (isset($description)): ?>
        <p class="text-center"><?= $description ?></p>
    <?php endif ?>

    <?php foreach ($projects as $project): ?>

        <?php if (isset($project['img'])): ?>

            <?php $this->insert('components/image-card', [
                'url' => $project['url'],
                'img' => $project['img'],
                'title' => $project['name'],
                'body' => $project['description'],
                'footer' => $project['footer'],
            ]) ?>

        <?php else: ?>

            <?php $this->insert('components/card', [
                'url' => $project['url'],
                'title' => $project['name'],
                'body' => $project['description'],
                'footer' => $project['footer'],
            ]) ?>

        <?php endif ?>



    <?php endforeach ?>
</div>
