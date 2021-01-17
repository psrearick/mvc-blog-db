<?php

use app\config\Config;
use core\Application;
use Dotenv\Dotenv;

require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = (new Config())->getConfig();
$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
