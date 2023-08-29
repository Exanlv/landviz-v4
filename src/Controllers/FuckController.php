<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\PhpFuck\Fucker;
use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;
use Psr\Http\Message\RequestInterface;

class FuckController extends Controller
{
    public function __construct(
        private readonly Engine $plates,
        private readonly Config $config,
        private readonly Fucker $fucker,
    ) {
        $colors = $this->config->get('hat-colors');
        $color = $colors[array_rand($colors)];

        $this->plates->addData(['color' => $color, 'components/bear']);
    }

    public function form()
    {
        $stream = new Stream();
        $stream->write($this->plates->render('pages/fuck/form'));

        return new Response(200, [], $stream);
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

        $stream = new Stream();
        $stream->write($this->plates->render('pages/fuck/display', ['code' => $this->fucker->fuckCode($code)]));

        return new Response(200, [], $stream);
    }
}
