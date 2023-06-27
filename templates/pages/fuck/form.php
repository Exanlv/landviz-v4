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
        <p>Enter PHP code to fuck below. HTML not supported. Do not use PHP opening or closing tags. Leave empty for hello world.</p>

        <form action="/fuck" method="post">
            <textarea class="form-control fuck-input" rows="15" name="code"></textarea>
            <input type="submit" class="btn btn-lv mt-5" value="Fuckify">
        </form>
    </div>
</div>

<?php $this->stop() ?>
