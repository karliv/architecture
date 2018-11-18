<?php

namespace Framework\Commands;


use Framework\ICommand;
use Framework\Receivers\ReceiverRoutes;

class CommandRoutes implements ICommand
{
    private $receiver;
    public function __construct(ReceiverRoutes $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->registerRoutes();
    }

}