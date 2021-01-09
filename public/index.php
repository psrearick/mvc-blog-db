<?php


use app\controllers\AuthController;
use app\controllers\SiteController;
use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dir = dirname(__DIR__);

$app = new Application($dir);

$app->router->get('/', [SiteController::class, 'showPosts']);
$app->router->get('/create-post', [SiteController::class, 'createPost']);
$app->router->post('/create-post', [SiteController::class, 'handleCreatePost']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();



