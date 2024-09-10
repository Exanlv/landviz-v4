<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\Landviz\ResponseBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class WoodController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responseBuilder,
        private readonly Config $config,
    ) {
    }

    public function form(RequestInterface $request): ResponseInterface
    {
        return $this->responseBuilder->build($request, 'pages/wood/form', [], false);
    }

    public function document(RequestInterface $request)
    {
        $parts = array_map(fn (string $name, string $width, string $height, string $thickness, string $amount) => [
            'name' => $name,
            'width' => $width,
            'height' => $height,
            'thickness' => $thickness,
            'amount' => $amount,
        ], $_GET['n'], $_GET['w'], $_GET['h'], $_GET['t'], $_GET['a']);

        return $this->responseBuilder->build($request, 'pages/wood/document', ['parts' => $parts], false);
    }
}
