<?php

namespace Exan\Landviz;

use HttpSoft\Message\Response;
use HttpSoft\Message\StreamFactory;
use League\Plates\Engine;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

class ResponseBuilder
{
    private bool $addDisclaimer = true;

    public function __construct(
        private Engine $engine,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function build(
        RequestInterface $request,
        string $templatePath,
        array $data,
        bool $allowJson = true,
    ) {
        return $allowJson && str_contains($this->getHeaderLine($request), 'application/json')
            ? $this->getJsonResponse($data)
            : $this->getHtmlResponse($templatePath, $data);
    }

    private function getHeaderLine(RequestInterface $request)
    {
        $header = $request->getHeader('Accept');

        return count($header) > 0
            ? $header[0]
            : '';
    }

    public function disableDisclaimer()
    {
        $this->addDisclaimer = false;
    }

    private function getHtmlResponse(string $templatePath, array $data)
    {
        return new Response(
            body: $this->streamFactory->createStream(
                $this->engine->render($templatePath, $data)
            )
        );
    }

    private function getJsonResponse(array $data)
    {
        if ($this->addDisclaimer) {
            $data = [
                'NOTICE' => 'This JSON output is NOT stable and you should not rely on it.',
                ...$data,
            ];
        }

        return new Response(
            headers: ['Content-Type' => 'application/json'],
            body: $this->streamFactory->createStream(json_encode($data))
        );
    }
}
