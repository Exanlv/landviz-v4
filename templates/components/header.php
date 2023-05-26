<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<div class="px-5 mb-4 rounded-3 position-relative" id="header">
    <div class="container-fluid pt-2 text-center">
        <div style="max-height: 30vh; max-width: 100%;">
            <?php $this->insert('components/bear') ?>
        </div>
    </div>

    <div class="snowflake" id="special-snowflake" role="presentation"></div>

    <?php for ($i = 0; $i < 60; $i++): ?>
        <div class="snowflake" role="presentation"></div>
    <?php endfor ?>
</div>
