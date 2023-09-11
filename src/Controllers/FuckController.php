<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\Landviz\ResponseBuilder;
use Exan\PhpFuck\Fucker;
use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;
use Psr\Http\Message\RequestInterface;

class FuckController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responseBuilder,
        private readonly Config $config,
        private readonly Fucker $fucker,
    ) {
    }

    public function form(RequestInterface $request)
    {
        return $this->responseBuilder->build($request, 'pages/fuck/form', [], false);
    }

    public function fuck(RequestInterface $request)
    {
        $body = $request->getBody()->getContents();

        $params = [];
        parse_str($body, $params);

        $default = 'echo "Hello, world", PHP_EOL;';

        $code = $params['code'] ?? $default;

        if ($code === '') {
            $code = $default;
        }

        return $this->responseBuilder->build($request, 'pages/fuck/display', ['code' => $this->fucker->fuckCode($code)], false);
    }
}
