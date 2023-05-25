<?php

use Exan\Container\Container;
use Exan\Landviz\Controllers\HomeController;
use Exan\Router\Route\Route;
use Exan\Router\Router;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\ServerRequest\ServerRequestCreator;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;

require_once './vendor/autoload.php';

if (
    php_sapi_name() == 'cli-server'
    && $_SERVER["REQUEST_URI"] !== '/'
    && file_exists(__DIR__ . '/../' . $_SERVER["REQUEST_URI"])
) {
    return false;
}

$container = new Container();

$container->register(Engine::class, new Engine('./templates'));

$request = ServerRequestCreator::createFromGlobals();

$router = new Router($container, [
    new Route('GET', '/^\/$/', HomeController::class, 'index'),
]);

/** @var ResponseInterface */
$response = $router->run($request);

(new SapiEmitter())->emit($response);
