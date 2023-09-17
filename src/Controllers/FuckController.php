<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\InputParser\Parser;
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
        private readonly Parser $parser,
    ) {
    }

    public function form(RequestInterface $request)
    {
        return $this->responseBuilder->build($request, 'pages/fuck/form', [], false);
    }

    public function fuck(RequestInterface $request)
    {
        $body = $this->parser->parse($request);

        $default = 'echo "Hello, world", PHP_EOL;';

        $code = $body['code'] ?? $default;

        if ($code === '') {
            $code = $default;
        }

        return $this->responseBuilder->build($request, 'pages/fuck/display', ['code' => $this->fucker->fuckCode($code)]);
    }
}
