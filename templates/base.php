<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<html>

<head>

    <title>Landviz.nl</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/assets/css/main-24-09-08.css">

    <link rel="icon" type="image/x-icon" href="/public/assets/img/favicon.ico">

</head>

<body>

    <div class="page">
        <div class="container-lg py-4">
            <?= $this->section('page') ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/public/assets/js/main.js"></script>
    </div>

</body>

</html>
