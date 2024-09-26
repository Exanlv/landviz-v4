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

    private function getParts(): array
    {
        return array_map(fn (string $name, string $width, string $height, string $thickness, string $amount) => [
            'name' => $name,
            'width' => $width,
            'height' => $height,
            'thickness' => $thickness,
            'amount' => $amount,
        ], $_GET['n'], $_GET['w'], $_GET['h'], $_GET['t'], $_GET['a']);
    }

    private function getUnits(): array
    {
        $override = empty($_GET['so']) ? null : $_GET['so'];

        return isset($_GET['bad_units']) ? [
            'fontSize' => $override ?? 10,
            'unit' => 'imperial',
        ] : [
            'fontSize' => $override ?? 5,
            'unit' => 'metric',
        ];
    }

    public function document(RequestInterface $request): ResponseInterface
    {
        return $this->responseBuilder->build($request, 'pages/wood/document', [
            'parts' => $this->getParts(),
            'editUrl' => '/wood/edit?' . urldecode($request->getUri()->getQuery()),
            ...$this->getUnits(),
        ], false);
    }

    public function edit(RequestInterface $request): ResponseInterface
    {
        return $this->responseBuilder->build($request, 'pages/wood/form', [
            'parts' => $this->getParts(),
            ...$this->getUnits()
        ], false);
    }
}
