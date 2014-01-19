<?php
use Igorw\Silex\ConfigServiceProvider;
use Silex\Application;

date_default_timezone_set('UTC');

set_time_limit(0);

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';

$app = new Application();

// Config
$app->register(
    new ConfigServiceProvider(__DIR__ ."/../config/config.php")
);
