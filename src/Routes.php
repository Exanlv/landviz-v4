<?php

namespace Exan\Landviz;

use Exan\Landviz\Controllers\FuckController;
use Exan\Landviz\Controllers\HomeController;
use Exan\Router\Route\Route;
use Exan\Router\RouteInterface;

class Routes
{
    /**
     * @return RouteInterface[]
     */
    public static function get(): array
    {
        return [
            new Route('GET', '/^\/$/', HomeController::class, 'index'),
            new Route('GET', '/^\/projects$/', HomeController::class, 'projects'),
            new Route('GET', '/^\/colors$/', HomeController::class, 'colors'),

            new Route('GET', '/^\/fuck$/', FuckController::class, 'form'),
            new Route('POST', '/^\/fuck$/', FuckController::class, 'fuck'),
        ];
    }
}
