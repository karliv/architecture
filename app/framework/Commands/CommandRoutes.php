<?php

namespace Framework\Commands;


use Framework\ICommand;

class CommandRoutes implements ICommand
{
    public function execute(CommandArgs $args = null)
    {
        $args->routeCollection = require $args->dir . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $args->containerBuilder->set('route_collection', $args->routeCollection);
        return $args;
    }
}