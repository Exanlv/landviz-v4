<?php

use Exan\Config\Config;
use Exan\Container\Container;
use Exan\Landviz\Controllers\ErrorController;
use Exan\Landviz\Routes;
use Exan\Router\Exceptions\HttpException;
use Exan\Router\Exceptions\HttpServerException;
use Exan\Router\Router;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\ServerRequest\ServerRequestCreator;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;

require __DIR__ . '/../vendor/autoload.php';

if (
    php_sapi_name() == 'cli-server'
    && $_SERVER["REQUEST_URI"] !== '/'
    && file_exists(__DIR__ . '/../' . $_SERVER["REQUEST_URI"])
) {
    return false;
}

$container = new Container();
$container->register(Engine::class, new Engine(__DIR__ . '/../templates'));
$container->register(Config::class, new Config(__DIR__ . '/../conf'));

$router = new Router($container, Routes::get());
$request = ServerRequestCreator::createFromGlobals();

try {
    /** @var ResponseInterface */
    $response = $router->run($request);
} catch (HttpException $e) {
    $response = $container->get(ErrorController::class)->render($e);
} catch (Throwable $e) {
    $response = $container->get(ErrorController::class)->render(
        new HttpServerException(previous: $e),
    );
}

(new SapiEmitter())->emit($response);
