<?php

declare(strict_types = 1);

namespace Framework\Receivers;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class ReceiverRoutes
{
    public $request;

    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    public function __construct(Request $request, ContainerBuilder $containerBuilder)
    {
        $this->request = $request;
        $this->containerBuilder = $containerBuilder;
    }

    /**
     * @return void
     */
    public function registerRoutes(): void
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}
