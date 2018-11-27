<?php

namespace Framework\Commands;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;

class CommandArgs
{
    /**
     * @var String
     */
    public $dir;

    /**
     * @var RouteCollection
     */
    public $routeCollection;

    /**
     * @var ContainerBuilder
     */
    public $containerBuilder;

    /**
     * @var Request
     */
    public $request;

    /**
     * @var Response
     */
    public $response;

}