<?php

namespace Framework\Commands;


use Framework\ICommand;
use Framework\Receivers\ReceiverConfigs;

class CommandConfigs implements ICommand
{
    private $receiver;
    public function __construct(ReceiverConfigs $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->registerConfigs();
    }

}