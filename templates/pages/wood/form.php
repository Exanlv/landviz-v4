<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5 text-center">
        <h1>Wood cutting list</h1>
        <p>
            Input dimensions of your parts.
            Height and width should be in CM, thickness should be in MM.
        </p>

        <button id="add-input" class="btn btn-success">
            Add part
        </button>

        <p>
            <form action="/wood/document">
                <div id="wood-form">
                    <?= $this->insert('pages/wood/part-input') ?>
                </div>

                <button class="btn btn-primary">
                    Submit
                </button>
            </form>
        </p>
    </div>
</div>

<div id="part-input" class="d-none">
    <?= $this->insert('pages/wood/part-input') ?>
</div>

<script>
    const form = document.getElementById('wood-form');
    const inputTemplate = document.getElementById('part-input').innerHTML;

    document.getElementById('add-input').onclick = () => {
        form.innerHTML += inputTemplate;
    };
</script>

<?php $this->stop() ?>
