<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('base') ?>

<?php $this->start('page') ?>
    <?php $this->insert('components/nav') ?>
    <?php $this->insert('components/header') ?>

    <?= $this->section('main', 'If you see this, I messed something up :)') ?>
<?php $this->stop() ?>
