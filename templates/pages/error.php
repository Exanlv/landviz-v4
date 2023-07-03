<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('base') ?>

<?php $this->start('page') ?>
    <div class="text-center">
        <img src="/public/assets/img/error.svg" alt="Penguin on ice" style="max-width: 30rem">

        <H4><?= $code ?></H4>
        <p><?= $message ?></p>

        <a href="/" class="btn btn-lv mt-5">
            Go back home
        </a>
    </div>
<?php $this->stop() ?>
