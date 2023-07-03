<?php

use Exan\Config\Config;
use Exan\Container\Container;
use Exan\Landviz\Controllers\ErrorController;
use Exan\Landviz\Controllers\FuckController;
use Exan\Landviz\Controllers\HomeController;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\ServerRequest\ServerRequestCreator;
use League\Plates\Engine;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use League\Route\Strategy\StrategyInterface;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->register(Engine::class, new Engine(__DIR__ . '/../templates'));
$container->register(Config::class, new Config(__DIR__ . '/../conf'));

/** @var StrategyInterface */
$strategy = (new ApplicationStrategy())->setContainer($container);
/** @var Router */
$router = (new Router())->setStrategy($strategy);

$router->map('GET', '/',         [HomeController::class, 'index']);
$router->map('GET', '/projects', [HomeController::class, 'projects']);
$router->map('GET', '/colors',   [HomeController::class, 'colors']);

$router->map('GET',  '/fuck', [FuckController::class, 'form']);
$router->map('POST', '/fuck', [FuckController::class, 'fuck']);

$request = ServerRequestCreator::createFromGlobals();

try {
    $response = $router->dispatch($request);
} catch (Throwable $e) {
    $response = $container->get(ErrorController::class)->resolve($e);
}


(new SapiEmitter())->emit($response);
