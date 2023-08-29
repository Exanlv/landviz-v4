<?php

namespace Exan\Landviz;

use Exan\Config\Config;
use Exan\Container\Container;
use League\Plates\Engine;

class App
{
    public static function getContainer(): Container
    {
        $container = new Container();

        $container->register(Engine::class, new Engine(__DIR__ . '/../templates'));
        $container->register(Config::class, new Config(__DIR__ . '/../conf'));

        return $container;
    }
}
