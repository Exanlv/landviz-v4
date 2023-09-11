<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5 text-center">
        <h1>Dependencies</h1>
        <p>List of all currently installed dependencies on this site</p>

        <?php foreach ($dependencies as $package): ?>
            <b><?= $package['name'] ?></b> - <?= $package['version'] ?> <br />
        <?php endforeach ?>
    </div>
</div>

<?php $this->stop() ?>
