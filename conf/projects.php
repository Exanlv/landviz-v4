<?php

return [
    'fenrir' => [
        'name' => 'Fenrir',
        'footer' => 'Uses PHP, ReactPHP',
        'img' => '/public/assets/img/projects/fenrir.webp',
        'description' => 'Fenrir is a low-level wrapper over Discords APIs/gateway. Can be used to create highly optimized Discord bots & apps in PHP.',
        'url' => 'https://github.com/dc-Ragnarok/Fenrir',
        'highlighted' => true,
    ],
    'bifrost' => [
        'name' => 'Bifrost',
        'footer' => 'Uses PHP, ReactPHP (WIP)',
        'img' => '/public/assets/img/projects/bifrost.webp',
        'description' => 'Bifrost is a low-level HTTP library for Discord\'s REST APIs. It handles ratelimiting in a multi-process compatible way.',
        'url' => 'https://github.com/dc-Ragnarok/Bifrost',
        'highlighted' => false,
    ],
    'landviz' => [
        'name' => 'Landviz.nl',
        'footer' => 'Uses PHP, Rxak, HttpSoft',
        'img' => '/public/assets/img/projects/landviz_nl.webp',
        'description' => 'This site is made using HttpSoft\'s PSR-7 implementations and some self-made components for routing, dependency injection and configuration. This ends up being about twice as fast (computing time) as my previous solution which used SlimPHP. There\'s also a few easter eggs you can try to find. ',
        'url' => 'https://github.com/Exanlv/landviz-nb',
        'highlighted' => true,
    ],
    'bread_bot' => [
        'name' => 'Bread Bot',
        'footer' => 'Uses Java',
        'img' => '/public/assets/img/projects/bread.webp',
        'description' => 'Bread bot is a simple discord bot that allows you to collect points (called bread). These points can then be used to gamble and play minigames with.',
        'url' => 'https://github.com/Exanlv/java-bread',
        'highlighted' => false,
    ],

    // RXAK
    'container' => [
        'name' => 'Container',
        'footer' => 'Uses PHP, PSR-11',
        'description' => 'An implementation for PSR-11 ContainerInterface which can automatically resolve dependencies. Similar to Laravel\'s container.',
        'url' => 'https://github.com/rxak-php/Container',
        'highlighted' => false,
    ],
    'router' => [
        'name' => 'Router',
        'footer' => 'Uses PHP, PSR-7',
        'description' => 'A HTTP router for routing PSR-7 requests. Supports multi-domain, grouping and uses regex for its pattern matching. Multi-domain support out of the box and can be easily extended to support most usecases. The use of regex for the routing allows it to be extremely fast compared to other solutions which use a more user friendly format.',
        'url' => 'https://github.com/rxak-php/Router',
        'highlighted' => false,
    ],
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
    'migrations' => [
        'name' => 'Migrations',
        'footer' => 'Uses PHP',
        'description' => 'Easy to use, framework-agnostic migrations using the filesystem. Designed to not have any external dependencies, can be used for everything from migrating databases to adding a new default value to environment files that isn\'t in source control.',
        'url' => 'https://github.com/rxak-php/Migrations',
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
