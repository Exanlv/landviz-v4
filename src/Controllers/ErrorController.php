<?php

namespace Exan\Landviz\Controllers;

use HttpSoft\Message\Response;
use League\Plates\Engine;
use League\Route\Http\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ErrorController extends Controller
{
    public function __construct(private readonly Engine $plates)
    {
    }

    public function resolve(Throwable $e): ResponseInterface
    {
        $knownErrors = [
            NotFoundException::class => [404, 'Not Found.'],
        ];

        foreach ($knownErrors as $error => $params) {
            if ($e instanceof $error) {
                return $this->render(...$params);
            }
        }

        return $this->render(502, 'Something went wrong.');
    }

    public function render(int $status, string $message)
    {
        $response = new Response($status);
        $response->getBody()->write($this->plates->render('pages/error', [
            'code' => $status,
            'message' => $message,
        ]));

        return $response;
    }
}
