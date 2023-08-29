<?php

use Exan\Landviz\App;
use Exan\Landviz\Controllers\HomeController;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    private HomeController $homeController;

    protected function setUp(): void
    {
        $this->homeController = App::getContainer()->get(HomeController::class);
    }

    public function testItShowsHighlightedProjectsOnTheHomePage()
    {
        $response = $this->homeController->index();
        $body = (string) $response->getBody();

        $this->assertStringContainsString('Fenrir', $body);
        $this->assertStringContainsString('Landviz', $body);
    }

    public function testItShowsProjects()
    {
        $response = $this->homeController->projects();
        $body = (string) $response->getBody();

        $this->assertStringContainsString('Discord', $body);
        $this->assertStringContainsString('Rxak', $body);
        $this->assertStringContainsString('Collection of smaller packages.', $body);
        $this->assertStringContainsString('Container', $body);
    }
}
