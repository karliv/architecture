<?php

namespace Framework\Commands;


use Framework\ICommand;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Throwable;

class CommandConfigs implements ICommand
{
    public function execute(CommandArgs $args = null)
    {
        try {
            $fileLocator = new FileLocator($args->dir . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($args->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (Throwable $e) {
            var_dump(__DIR__);
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }

        return $args;
    }

}