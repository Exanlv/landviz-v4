<div class="px-md-5 mb-5 json-available">
    <div class="container px-md-5">

        <p>This content is also available as JSON</p>

        <code class="d-block text-left">
            curl --request <?= $method ?? 'GET' ?> --url https://<?= ($_SERVER['HTTP_HOST'] ?? 'landviz.nl') . ($_SERVER['REQUEST_URI'] ?? '/') ?> --header 'Accept: application/json' <?= isset($body) ? '--data ' . $body : '' ?>
        </code>
    </div>
</div>
