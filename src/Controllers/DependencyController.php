<?php

namespace Exan\Landviz\Controllers;

use Composer\InstalledVersions;
use Exan\Config\Config;
use Exan\Landviz\Controllers\Controller;
use Exan\Landviz\ResponseBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DependencyController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responder,
        private readonly Config $config,
    ) {
    }

    public function index(RequestInterface $request): ResponseInterface
    {
        $dependencies = array_filter(
            InstalledVersions::getInstalledPackages(),
            fn ($package) => $package !== 'exan/landviz'
        );

        $versionedDependencies = array_values(array_map(
            fn ($package) => ['name' => $package, 'version' => InstalledVersions::getVersion($package)] ?? '¯\_(ツ)_/¯',
            $dependencies
        ));

        return $this->responder->build(
            $request,
            'pages/dependency/index',
            [
                'dependencies' => $versionedDependencies
            ]
        );
    }
}
