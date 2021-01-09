<?php

//require_once Application::class

use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', function(){
    return 'Hello';
});

$app->run();



