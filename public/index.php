<?php


use app\models\User;
use app\src\Application;
use app\src\Routes;

require_once __DIR__ . '/../vendor/autoload.php';

$config = [
    // TODO: Here is where we would read the .env to get information such as database credentials
    'userClass' => User::class,
    'start_logged_in' => false
];

$dir = dirname(__DIR__);

$app = new Application($dir, $config);

Routes::setRoutes();

$app->run();

// DEMO
if ($config['start_logged_in']) {
    $app->login((new User)->findOne([]));
}
