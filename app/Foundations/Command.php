<?php

namespace App\Foundations;

use Illuminate\Console\Command as IlluminateCommand;

abstract class Command extends IlluminateCommand
{
    public function getInput()
    {
        return $this->input;
    }
}
