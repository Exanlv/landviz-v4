<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5">

        <?php foreach ($colors as $color) : ?>

            <div class="row gx-1 m-3" style="line-height: 5em;">
                <div class="col" style="background: #<?= $color ?>; border: 1px dashed black;">
                    &nbsp;
                </div>
                <div class="col p-2">
                    <?= $color ?>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>

<?php $this->insert('components/available-as-json') ?>

<?php $this->stop() ?>
