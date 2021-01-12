<?php


use app\controllers\AuthController;
use app\controllers\BlogController;
use app\models\User;
use app\src\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$config = [
    // TODO: Here is where we would read the .env to get information such as database credentials
    'userClass' => User::class,
    'start_logged_in' => false
];

$dir = dirname(__DIR__);

$app = new Application($dir, $config);

$app->router->get('/', [BlogController::class, 'showPosts']);
$app->router->get('/create-post', [BlogController::class, 'createPost']);
$app->router->post('/create-post', [BlogController::class, 'createPost']);
$app->router->get('/post/(any:name)', [BlogController::class, 'post']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();

// DEMO
if ($config['start_logged_in']) {
    $app->login((new User)->findOne([]));
}
