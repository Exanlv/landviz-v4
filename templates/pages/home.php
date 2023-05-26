<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('my-section') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5 text-center">
        <h1>Welcome!</h1>
        <p>Hey! I'm Max. I started getting into programming late 2016</p>

        <p>
            I'm a backend developer experienced in Javascript, Typescript, PHP, Java, Python and SQL.
            I also know my way around HTML and CSS and some light photo editing.
            As for frameworks, most of my experience is with Laravel.
            I have however also worked with Symfony, Angular, Fastify and jQuery.
        </p>

        <p>
            Check out my GitHub profile
            <a href="https://github.com/Exanlv">
                here!
            </a>
        </p>
    </div>
</div>

<div class="px-md-5 mb-5">
    <div class="container px-md-5">
        <?php $this->insert('components/card', [
            'url' => 'https://github.com/dc-Ragnarok/Fenrir',
            'img' => '/public/assets/img/projects/fenrir.png',
            'title' => 'Fenrir',
            'body' => 'Fenrir is a low-level wrapper over Discords APIs/gateway. Can be used to create highly optimized Discord bots & apps in PHP.',
            'footer' => 'Uses PHP, ReactPHP',
        ]) ?>
    </div>
</div>


<?php $this->stop() ?>
