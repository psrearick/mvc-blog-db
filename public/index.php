<?php


use app\controllers\AuthController;
use app\controllers\SiteController;
use app\models\User;
use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$config = [
    // TODO: Here is where we would read the .env to get information such as database credentials
    'userClass' => User::class,
];

$dir = dirname(__DIR__);

$app = new Application($dir, $config);

$app->router->get('/', [SiteController::class, 'showPosts']);
$app->router->get('/create-post', [SiteController::class, 'createPost']);
$app->router->post('/create-post', [SiteController::class, 'handleCreatePost']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->run();



