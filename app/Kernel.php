<?php

declare(strict_types = 1);

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;

use Framework\Commands\CommandArgs;

class Kernel
{
    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    protected $commandArgs;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->commandArgs = new CommandArgs();
        $this->commandArgs->dir = __DIR__;
        $this->commandArgs->containerBuilder = $containerBuilder;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $this->commandArgs->request = $request;

        $command = new \Framework\Commands\CommandConfigs();
        $this->commandArgs = $command->execute($this->commandArgs);

        $command = new \Framework\Commands\CommandRoutes();
        $this->commandArgs = $command->execute($this->commandArgs);

        $command = new \Framework\Commands\CommandProcess();
        $this->commandArgs = $command->execute($this->commandArgs);

        return $this->commandArgs->response;
    }
}
