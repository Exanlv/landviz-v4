<?php if (count($errors) > 0) : ?>
    <div class="px-md-5 mb-5">
        <div class="container px-md-5 text-center">
            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <span><?= $error['path'] ?> - <?= $error['message'] ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
