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
                <?php if (isset($parts)): ?>
                    <?php foreach ($parts as $part): ?>
                        <?= $this->insert('pages/wood/part-input', $part) ?>
                    <?php endforeach ?>
                <?php else: ?>
                    <div id="wood-form">
                        <?= $this->insert('pages/wood/part-input') ?>
                    </div>
                <?php endif ?>

                <table width="100%">
                    <tr>
                        <td width="50%"><input type="number" name="so" class="form-control" value="<?= $_GET['so'] ?? '' ?>" /></td>
                        <td class="text-center">Size override (Metric default: 5, inferior: 10)</td>
                    </tr>
                </table>

                <br /><br />

                <input type="checkbox" name="bad_units" <?= empty($_GET['bad_units']) ? '' : 'checked' ?> /> Use inferior units (inches for everything) <br /><br />

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
    const inputTemplate = document.getElementById('part-input');

    document.getElementById('add-input').onclick = () => {
        const node = inputTemplate.cloneNode(true)
        node.className = '';

        form.appendChild(node);
    };
</script>

<?php $this->stop() ?>
