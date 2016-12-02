<?php

use Slim\App;
use Slim\Container;

$files = glob(__DIR__.'/../config/*.php');

$config = [];

foreach ($files as $file) {
    $setting = pathinfo($file, PATHINFO_FILENAME);
    $options = require $file;
    $config[$setting] = $options;
}

$container = new Container($config);

$app = new App($container);

return $app;
