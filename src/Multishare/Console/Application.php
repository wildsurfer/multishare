<?php

namespace Multishare\Console;

use Multishare\Console\Command;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication {

    protected $app;

    public function __construct(\Silex\Application $app) {
        $this->app = $app;
        parent::__construct('Multishare CLI Application', '0.1.0');
    }

    public function getDefaultCommands() {
        $commands = parent::getDefaultCommands();

        $commands[] = new Command\TwitterUrlCommand($this->app);

        return $commands;
    }
}
