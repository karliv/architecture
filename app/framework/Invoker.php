<?php

namespace Framework;


class Invoker
{
    public function action(ICommand $command) {
        return $command->execute();
    }
}