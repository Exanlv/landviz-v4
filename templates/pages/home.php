<?php

/**
 * @var \League\Plates\Template\Template $this
 */

?>

<?php $this->layout('content-page') ?>

<?php $this->start('main') ?>

<div class="px-md-5 mb-5">
    <div class="container px-md-5 text-center">
        <h1>Welcome!</h1>
        <p>Hey! I'm Max. I started getting into programming late 2016.</p>

        <p>
            I'm a backend developer experienced in Java- & Typescript, PHP, Java, Python and SQL.
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
        <?php $this->insert('components/project-category', [
            'category_name' => 'Highlighted Projects',
            'projects' => $projects,
        ]) ?>

        <div class="text-center">
            <a href="/projects" class="btn btn-lv mt-5">
                More
            </a>
        </div>

    </div>
</div>



<?php $this->stop() ?>
