<?php

namespace Tests\Unit;

use Exan\Landviz\ResponseBuilder;
use Exan\Moock\Mock;
use Exan\Moock\MockedClassInterface;
use HttpSoft\Message\Request;
use HttpSoft\Message\StreamFactory;
use League\Plates\Engine;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class ResponseBuilderTest extends TestCase
{
    private MockedClassInterface&Engine $engine;
    private ResponseBuilder $responseBuilder;

    protected function setUp(): void
    {
        $this->engine = Mock::class(Engine::class);

        $this->responseBuilder = new ResponseBuilder($this->engine, new StreamFactory());
        $this->responseBuilder->disableDisclaimer();
    }

    private function getRequest(string $accept): RequestInterface
    {
        $request = new Request(headers: ['Accept' => $accept]);

        return $request;
    }

    #[Test]
    public function it_returns_json_if_requested_and_allowed()
    {
        $response = $this->responseBuilder->build(
            $this->getRequest('application/json'),
            '::path::',
            ['hello' => 'there'],
            true
        );

        $this->assertEquals(json_encode(['hello' => 'there']), (string) $response->getBody());
        $this->assertContains('application/json', $response->getHeader('Content-Type'));
        Mock::method($this->engine->render(...))->assert()->not()->called();
    }

    #[Test]
    public function it_does_not_return_json_if_requested_and_not_allowed()
    {
        $data = ['hello' => 'there'];
        Mock::method($this->engine->render(...))
            ->allow('::path::', $data)
            ->returns('Some cool rendered template');

        $response = $this->responseBuilder->build(
            $this->getRequest('application/json'),
            '::path::',
            $data,
            false
        );

        $this->assertEquals('Some cool rendered template', (string) $response->getBody());
    }

    #[Test]
    public function it_returns_html_if_json_is_allowed_but_not_requested()
    {
        $data = ['hello' => 'there'];
        Mock::method($this->engine->render(...))
            ->allow('::path::', $data)
            ->returns('Some cool rendered template');

        $response = $this->responseBuilder->build(
            $this->getRequest('text/html'),
            '::path::',
            $data,
            true
        );

        $this->assertEquals('Some cool rendered template', (string) $response->getBody());
    }

    #[Test]
    public function it_returns_html_if_no_accept_header_is_present()
    {
        $data = ['hello' => 'there'];
        Mock::method($this->engine->render(...))
            ->allow('::path::', $data)
            ->returns('Some cool rendered template');

        $response = $this->responseBuilder->build(
            new Request(),
            '::path::',
            $data,
            true
        );

        $this->assertEquals('Some cool rendered template', (string) $response->getBody());
    }
}
