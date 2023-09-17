<?php

use Exan\InputParser\Parser;
use Exan\Landviz\App;
use Exan\Landviz\Controllers\FuckController;
use Exan\PhpFuck\Fucker;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class FuckControllerTest extends TestCase
{
    private FuckController $fuckController;
    private MockInterface&Parser $parser;
    private MockInterface&Fucker $fucker;

    protected function setUp(): void
    {
        $this->fucker = Mockery::mock(Fucker::class);
        $this->parser = Mockery::mock(Parser::class);

        $container = App::getContainer();

        $container->register(Fucker::class, $this->fucker);
        $container->register(Parser::class, $this->parser);

        $this->fuckController = $container->get(FuckController::class);
    }

    private function getMockRequest(string $body): RequestInterface
    {
        /** @var MockInterface&StreamInterface */
        $stream = Mockery::mock(StreamInterface::class);

        $stream
            ->expects()
            ->getContents()
            ->andReturns($body);

        /** @var MockInterface&RequestInterface */
        $request = Mockery::mock(RequestInterface::class);

        $request
            ->expects()
            ->getBody()
            ->andReturns($stream);

        $request->shouldReceive()
            ->getHeader()
            ->with('Accept')
            ->andReturn([]);

        return $request;
    }

    public function testItFucksCode()
    {
        $request = $this->getMockRequest('code=::code::');

        $this->parser->shouldReceive()
            ->parse()
            ->with($request)
            ->andReturn(['code' => '::code::']);

        $this->fucker->shouldReceive()->fuckCode()->with('::code::')->andReturns('::fucked code::');

        $response = $this->fuckController->fuck($request);

        $body = (string) $response->getBody();

        $this->assertStringContainsString('::fucked&nbsp;code::', $body);
    }
}
