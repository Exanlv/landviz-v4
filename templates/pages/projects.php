<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5">

        <?php foreach ($categories as $category) : ?>

            <?php $this->insert('components/project-category', [
                'category_name' => $category['name'],
                'description' => $category['description'],
                'projects' => $category['projects'],
            ]) ?>

        <?php endforeach ?>

        <div class="text-center">
            <a href="/" class="btn btn-lv mt-5">
                Back
            </a>
        </div>

    </div>
</div>

<?php $this->stop() ?>
