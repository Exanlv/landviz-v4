<?php

namespace Exan\Landviz;

use Exan\Config\Config;
use Exan\InputParser\Parser;
use HttpSoft\Message\StreamFactory;
use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Plates\Engine;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class App
{
    public static function getContainer(): Container
    {
        $container = new Container();

        /**
         * For some reason this is not the default.
         *
         * If someone could explain to me, what the point is of a container, if you don't have this behaviour, I'd love
         * to hear your nonsense.
         *
         * Actually I wouldn't like to hear that. It just makes no sense. Do better.
         */
        $container->delegate(new ReflectionContainer());

        /**
         * This one is more acceptable to not be the default behaviour, but it should throw an exception if overwriting
         * is attempted with it disabled.
         */
        $container->defaultToOverwrite(true);

        $config =  new Config(__DIR__ . '/../conf');
        $engine = new Engine(__DIR__ . '/../templates');

        $colors = $config->get('hat-colors');
        $color = $colors[array_rand($colors)];

        $engine->addData(['color' => $color, 'components/bear']);

        $container->add(Parser::class, fn () => Parser::withDefaultDrivers());
        $container->add(Engine::class, fn () => $engine);
        $container->add(Config::class, fn () => $config);
        $container->add(StreamFactoryInterface::class, fn () => new StreamFactory());
        $container->add(ValidatorInterface::class, fn () => Validation::createValidator());

        return $container;
    }
}
