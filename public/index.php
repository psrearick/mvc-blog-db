<?php


use app\models\User;
use app\src\Application;
use app\src\Routes;
use app\config\Config;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$dir = dirname(__DIR__);

$config = (new Config())->getConfig();

$app = new Application($dir, $config);

Routes::setRoutes();

$app->run();

