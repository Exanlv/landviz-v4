<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<div class="row lv-card">
    <div class="col-xl-3">
        <a href="<?= $url ?>" target="_blank">
            <img class="lv-card-img" src="<?= $img ?>">
        </a>
    </div>
    <div class="col-xl-9 lv-card-content">
        <div>
            <h4 class="my-3"><?= $title ?></h4>
        </div>
        <div>
            <span><?= $body ?></span>
        </div>
        <div class="text-muted lv-card-footer">
            <span><?= $footer ?></span>

            <a href="<?= $url ?>" target="_blank">
                View source
            </a>
        </div>
    </div>
</div>
