<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\Landviz\ResponseBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responseBuilder,
        private readonly Config $config,
    ) {
    }

    public function index(RequestInterface $request): ResponseInterface
    {
        $projects = array_filter(
            $this->config->get('projects'),
            fn ($p) => $p['highlighted']
        );

        return $this->responseBuilder->build($request, 'pages/home', ['projects' => $projects], false);
    }

    public function colors(RequestInterface $request)
    {
        return $this->responseBuilder->build(
            $request,
            'pages/colors',
            ['colors' => $this->config->get('colors')]
        );
    }

    public function projects(RequestInterface $request)
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

        return $this->responseBuilder->build(
            $request,
            'pages/projects',
            ['categories' => $categories]
        );
    }
}
