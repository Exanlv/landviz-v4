<?php

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
    private MockInterface&Fucker $fucker;

    protected function setUp(): void
    {
        $this->fucker = Mockery::mock(Fucker::class);
        $container = App::getContainer();
        $container->register(Fucker::class, $this->fucker);

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

        return $request;
    }

    public function testItFucksCode()
    {
        $this->fucker->shouldReceive()->fuckCode()->with('::code::')->andReturns('::fucked code::');
        $response = $this->fuckController->fuck($this->getMockRequest('code=::code::'));

        $body = (string) $response->getBody();

        $this->assertStringContainsString('::fucked&nbsp;code::', $body);
    }
}
