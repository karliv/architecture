<?php

namespace Framework\Commands;


use Framework\ICommand;
use Framework\Receivers\ReceiverProcess;

class CommandProcess implements ICommand
{
    private $receiver;
    public function __construct(ReceiverProcess $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        return $this->receiver->process($this->receiver->request);
    }

}