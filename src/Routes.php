<?php

namespace Exan\Landviz;

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
            new Route('GET', '/^\/projects$/', HomeController::class, 'index'),
            new Route('GET', '/^\/colors$/', HomeController::class, 'index'),
        ];
    }
}
