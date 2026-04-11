<?php

namespace Tests;

use Exan\Landviz\App;
use Exan\Landviz\Controllers\HomeController;
use HttpSoft\Message\Request;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    private HomeController $homeController;

    protected function setUp(): void
    {
        $this->homeController = App::getContainer()->get(HomeController::class);
    }

    #[Test]
    public function it_shows_highlighted_projects_on_the_home_page()
    {
        $response = $this->homeController->index(new Request());
        $body = (string) $response->getBody();

        $this->assertStringContainsString('Fenrir', $body);
        $this->assertStringContainsString('Landviz', $body);
    }

    #[Test]
    public function it_shows_projects()
    {
        $response = $this->homeController->projects(new Request());
        $body = (string) $response->getBody();

        $this->assertStringContainsString('Discord', $body);
        $this->assertStringContainsString('Rxak', $body);
        $this->assertStringContainsString('Collection of smaller packages.', $body);
        $this->assertStringContainsString('Container', $body);
    }
}
