<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exception;
use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function __construct(
        private readonly Engine $plates,
        private readonly Config $config,
    ) {
        $colors = $this->config->get('hat-colors');
        $color = $colors[array_rand($colors)];

        $this->plates->addData(['color' => $color, 'components/bear']);
    }

    public function index(): ResponseInterface
    {
        $projects = array_filter(
            $this->config->get('projects'),
            fn ($p) => $p['highlighted']
        );

        $stream = new Stream();
        $stream->write($this->plates->render('pages/home', ['projects' => $projects]));

        return new Response(200, [], $stream);
    }

    public function colors()
    {
        $stream = new Stream();
        $stream->write($this->plates->render('pages/colors', ['colors' => $this->config->get('colors')]));

        return new Response(200, [], $stream);
    }

    public function projects()
    {
        $allProjects = $this->config->get('projects');
        $allCategories = $this->config->get('categories');

        $categories = [];

        foreach ($allCategories as $categoryName => $category) {
            $categories[] = [
                'name' => $categoryName,
                'description' => $category['description'] ?? null,
                'projects' => array_map(fn ($project) => $allProjects[$project], $category['projects'])
            ];
        }

        $stream = new Stream();
        $stream->write($this->plates->render('pages/projects', ['categories' => $categories]));

        return new Response(200, [], $stream);
    }
}
