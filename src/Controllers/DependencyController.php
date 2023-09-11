<?php

namespace Exan\Landviz\Controllers;

use Composer\InstalledVersions;
use Exan\Config\Config;
use Exan\Landviz\Controllers\Controller;
use HttpSoft\Message\Response;
use HttpSoft\Message\Stream;
use League\Plates\Engine;
use Mockery;
use Psr\Http\Message\ResponseInterface;

class DependencyController extends Controller
{
    public function __construct(
        private readonly Engine $plates,
        private readonly Config $config,
    ) {
    }

    public function index(): ResponseInterface
    {
        $dependencies = array_filter(
            InstalledVersions::getInstalledPackages(),
            fn ($package) => $package !== 'exan/landviz'
        );

        $versionedDependencies = array_map(
            fn ($package) => ['name' => $package, 'version' => InstalledVersions::getVersion($package)] ?? '¯\_(ツ)_/¯',
            $dependencies
        );

        $stream = new Stream();
        $stream->write($this->plates->render('pages/dependency/index', ['dependencies' => $versionedDependencies]));

        return new Response(body: $stream);
    }
}
