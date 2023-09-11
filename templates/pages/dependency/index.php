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

        <table class="table">
            <?php foreach ($dependencies as $package): ?>
                <tr>
                    <td class="fw-bold">
                        <?= $package['name'] ?>
                    </td>
                    <td>
                        <?= $package['version'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

    </div>
</div>

<?php $this->insert('components/available-as-json') ?>

<?php $this->stop() ?>
