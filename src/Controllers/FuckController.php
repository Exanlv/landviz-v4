<?php

namespace Exan\Landviz\Controllers;

use Exan\InputParser\Exceptions\NoDriverException;
use Exan\InputParser\Parser;
use Exan\Landviz\ResponseBuilder;
use Exan\PhpFuck\Fucker;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FuckController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responseBuilder,
        private readonly Fucker $fucker,
        private readonly Parser $parser,
    ) {
    }

    public function form(RequestInterface $request)
    {
        return $this->responseBuilder->build($request, 'pages/fuck/form', [], false);
    }

    public function fuck(RequestInterface $request): ResponseInterface
    {
        try {
            $body = $this->parser->parse($request);
        } catch (NoDriverException) {
            $body = [];
        }

        if (isset($body['code']) && !is_string($body['code'])) {
            return $this->responseBuilder->build(
                $request,
                'pages/fuck/form',
                ['errors' => [
                    [
                        'path' => 'code',
                        'message' => 'This should be a valid string',
                    ]
                ]]
            )->withStatus(400);
        }

        $default = 'echo "Hello, world", PHP_EOL;';

        $code = $body['code'] ?? $default;

        if ($code === '') {
            $code = $default;
        }

        return $this->responseBuilder->build(
            $request,
            'pages/fuck/display',
            ['code' => $this->fucker->fuckCode($code)]
        );
    }
}
