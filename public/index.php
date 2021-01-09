<?php


use app\controllers\SiteController;
use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dir = dirname(__DIR__);

$app = new Application($dir);

$app->router->get('/', [SiteController::class, 'showPosts']);
$app->router->get('/create-post', [SiteController::class, 'createPost']);
$app->router->post('/create-post', [SiteController::class, 'handleCreatePost']);

$app->run();



