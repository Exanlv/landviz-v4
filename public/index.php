<?php

use Exan\Landviz\App;
use Exan\Landviz\Controllers\ErrorController;
use Exan\Landviz\Routes;
use Exan\Router\Exceptions\HttpException;
use Exan\Router\Exceptions\HttpServerException;
use Exan\Router\Router;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\ServerRequest\ServerRequestCreator;
use Psr\Http\Message\ResponseInterface;

require __DIR__ . '/../vendor/autoload.php';

if (
    php_sapi_name() == 'cli-server'
    && $_SERVER["REQUEST_URI"] !== '/'
    && file_exists(__DIR__ . '/../' . $_SERVER["REQUEST_URI"])
) {
    return false;
}

$container = App::getContainer();

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
