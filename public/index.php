<?php


use app\models\User;
use app\src\Application;
use app\src\Routes;
use app\config\Config;


require_once __DIR__ . '/../vendor/autoload.php';

$dir = dirname(__DIR__);

$config = (new Config())->getConfig();

$app = new Application($dir, $config);

Routes::setRoutes();

$app->run();

// DEMO
if ($config['start_logged_in']) {
    $app->login((new User)->findOne([]));
}
