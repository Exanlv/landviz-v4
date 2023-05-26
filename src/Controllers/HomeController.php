<?php

namespace Exan\Landviz\Controllers;

use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function __construct(private readonly Engine $plates)
    {
    }

    public function index(): ResponseInterface
    {
        $stream = new Stream();
        $stream->write($this->plates->render('pages/home'));

        return new Response(200, [], $stream);
    }

    public function colors()
    {

    }

    public function projects()
    {

    }
}
