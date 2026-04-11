<?php

namespace Tests;

use Exan\InputParser\Parser;
use Exan\Landviz\App;
use Exan\Landviz\Controllers\FuckController;
use Exan\Moock\Mock;
use Exan\Moock\MockedClassInterface;
use Exan\PhpFuck\Fucker;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class FuckControllerTest extends TestCase
{
    private FuckController $fuckController;
    private MockedClassInterface&Parser $parser;
    private MockedClassInterface&Fucker $fucker;

    protected function setUp(): void
    {
        $this->fucker = Mock::class(Fucker::class);
        $this->parser = Mock::class(Parser::class);

        $container = App::getContainer();

        $container->add(Fucker::class, fn () => $this->fucker);
        $container->add(Parser::class, fn () => $this->parser);

        $this->fuckController = $container->get(FuckController::class);
    }

    private function getMockRequest(string $body): RequestInterface
    {
        $stream = Mock::interface(StreamInterface::class);
        Mock::method($stream->getContents(...))->returns($body);

        $request = Mock::interface(RequestInterface::class);
        Mock::method($request->getBody(...))->returns($stream);
        Mock::method($request->getHeader(...))->allow('Accept')->returns([]);

        return $request;
    }

    #[Test]
    public function it_fucks_code()
    {
        $request = $this->getMockRequest('code=::code::');

        Mock::method($this->parser->parse(...))->returns(['code' => '::code::']);
        Mock::method($this->fucker->fuckCode(...))->returns('::fucked code::');

        $response = $this->fuckController->fuck($request);

        $body = (string) $response->getBody();

        $this->assertStringContainsString('::fucked code::', $body);
        Mock::method($this->fucker->fuckCode(...))->assert()->with('::code::')->calledOnce();
    }
}
