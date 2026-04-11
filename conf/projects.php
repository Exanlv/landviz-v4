<?php

return [
    'landviz' => [
        'name' => 'Landviz.nl',
        'footer' => 'Uses PHP',
        'img' => '/public/assets/img/projects/landviz_nl.webp',
        'description' => 'This site is made using HttpSoft\'s PSR-7 implementations and some self-made components dependency injection and configuration. Check out a full list of dependencies <a href="/dependencies">here!</a>. There\'s also a few easter eggs you can try to find. ',
        'url' => 'https://github.com/Exanlv/landviz-nb',
        'highlighted' => false,
    ],

    'moock' => [
        'name' => 'Moock',
        'footer' => 'Uses PHP, Reflection',
        'img' => '/public/assets/img/projects/moock.webp',
        'description' => 'An independent mocking library to create test doubles of classes or interfaces, allowing for more isolated tests.',
        'url' => 'https://github.com/Exanlv/moock',
        'highlighted' => true,
    ],

    'fenrir' => [
        'name' => 'Fenrir',
        'footer' => 'Uses PHP, ReactPHP, Async',
        'img' => '/public/assets/img/projects/fenrir.webp',
        'description' => 'Fenrir is a low-level wrapper over Discords APIs/gateway. Can be used to create highly optimized Discord bots & apps in PHP.',
        'url' => 'https://github.com/dc-Ragnarok/Fenrir',
        'highlighted' => true,
    ],

    // Utilities
    'eventer' => [
        'name' => 'Eventer',
        'footer' => 'Uses PHP',
        'description' => 'Object oriented library for event-based logic. Works similarly to evenement/evenement, but allows you to split up listeners into seperate classes which can be preferable for more complex requirements.',
        'url' => 'https://github.com/rxak-php/Eventer',
        'highlighted' => false,
    ],
    'reactphp-retrier' => [
        'name' => 'ReactPHP Retrier',
        'footer' => 'Uses PHP, ReactPHP',
        'description' => 'Some exceptions are temporary, this library allows you to easily retry failed async operations.',
        'url' => 'https://github.com/rxak-php/ReactPHP-Retrier',
        'highlighted' => false,
    ],
    'phpfuck' => [
        'name' => 'PHP Fuck',
        'footer' => 'Uses PHP',
        'description' => 'A port of JS Fuck for PHP. It converts PHP code into valid unreadable code using only <code>()[]@!,.+^</code>. Try it <a href="/fuck">here!</a>',
        'url' => 'https://github.com/Exanlv/phpfuck',
        'highlighted' => false,
    ],
];
