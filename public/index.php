<?php

use Exan\Landviz\App;
use Exan\Landviz\Controllers\DependencyController;
use Exan\Landviz\Controllers\ErrorController;
use Exan\Landviz\Controllers\FuckController;
use Exan\Landviz\Controllers\HomeController;
use Exan\Landviz\Controllers\WoodController;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\ServerRequest\ServerRequestCreator;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use League\Route\Strategy\StrategyInterface;

require __DIR__ . '/../vendor/autoload.php';

$container = App::getContainer();

/** @var StrategyInterface */
$strategy = (new ApplicationStrategy())->setContainer($container);
/** @var Router */
$router = (new Router())->setStrategy($strategy);

$router->map('GET', '/',         [HomeController::class, 'index']);
$router->map('GET', '/projects', [HomeController::class, 'projects']);
$router->map('GET', '/colors',   [HomeController::class, 'colors']);

$router->map('GET',  '/fuck', [FuckController::class, 'form']);
$router->map('POST', '/fuck', [FuckController::class, 'fuck']);

$router->map('GET', '/dependencies', [DependencyController::class, 'index']);

$router->map('GET', '/wood', [WoodController::class, 'form']);
$router->map('GET', '/wood/edit', [WoodController::class, 'edit']);
$router->map('GET', '/wood/document', [WoodController::class, 'document']);

$request = ServerRequestCreator::createFromGlobals();

try {
    $response = $router->dispatch($request);
} catch (Throwable $e) {
    $response = $container->get(ErrorController::class)->resolve($e);
}


(new SapiEmitter())->emit($response);
