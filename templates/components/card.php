<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<div class="row lv-card">
    <div class="col-xl-12 lv-card-content">
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
