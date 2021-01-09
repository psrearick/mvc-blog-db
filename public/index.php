<?php

//require_once Application::class

use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dir = dirname(__DIR__);

$app = new Application($dir);

$app->router->get('/', 'home');

$app->router->get('/create-post', 'create-post');

$app->run();



