<?php

namespace Exan\Landviz;

use Exan\Config\Config;
use Exan\Container\Container;
use HttpSoft\Message\StreamFactory;
use League\Plates\Engine;
use Psr\Http\Message\StreamFactoryInterface;

class App
{
    public static function getContainer(): Container
    {
        $container = new Container();

        $config =  new Config(__DIR__ . '/../conf');
        $engine = new Engine(__DIR__ . '/../templates');

        $colors = $config->get('hat-colors');
        $color = $colors[array_rand($colors)];

        $engine->addData(['color' => $color, 'components/bear']);

        $container->register(Engine::class, $engine);
        $container->register(Config::class, $config);
        $container->register(StreamFactoryInterface::class, new StreamFactory());

        return $container;
    }
}
