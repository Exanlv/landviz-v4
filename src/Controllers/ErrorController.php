<?php

namespace Exan\Landviz\Controllers;

use Exan\Router\Exceptions\HttpException;
use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;

class ErrorController extends Controller
{
    public function __construct(private readonly Engine $plates)
    {
    }

    public function render(HttpException $exception)
    {
        $stream = new Stream();
        $stream->write($this->plates->render('pages/error', [
            'exception' => $exception,
        ]));

        return new Response($exception->getHttpErrorCode(), [], $stream);
    }
}
