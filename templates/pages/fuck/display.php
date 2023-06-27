<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5 text-center">
        <h1>Fuck your code</h1>
        <p>Enjoy your fucked PHP</p>
    </div>

    <div class="container px-md-5 bg-light py-3 text-left">
        <?php highlight_string($code) ?>
    </div>
</div>

<?php $this->stop() ?>
