<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Framework\Registry::addContainer($containerBuilder);

$receiverConfig = new \Framework\Receivers\ReceiverConfigs($request, $containerBuilder);
$commandConfigs = new \Framework\Commands\CommandConfigs($receiverConfig);

$receiverRoutes = new \Framework\Receivers\ReceiverRoutes($request, $containerBuilder);
$commandRoutes = new \Framework\Commands\CommandRoutes($receiverRoutes);

$receiverProcess = new \Framework\Receivers\ReceiverProcess($request, $containerBuilder);
$commandProcess = new \Framework\Commands\CommandProcess($receiverProcess);

$invoker = new \Framework\Invoker();

$responseConfigs = $invoker->action($commandConfigs);
$responseRoutes = $invoker->action($commandRoutes);
$responseProcess = $invoker->action($commandProcess);

$responseConfigs->send();
$responseRoutes->send();
$responseProcess->send();
