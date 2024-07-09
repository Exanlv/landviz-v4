<?php

namespace Exan\Landviz;

use Exan\Config\Config;
use Exan\Container\Container;
use Exan\InputParser\Parser;
use HttpSoft\Message\StreamFactory;
use League\Plates\Engine;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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

        $container->register(Parser::class, Parser::withDefaultDrivers());
        $container->register(Engine::class, $engine);
        $container->register(Config::class, $config);
        $container->register(StreamFactoryInterface::class, new StreamFactory());
        $container->register(ValidatorInterface::class, Validation::createValidator());

        return $container;
    }
}
