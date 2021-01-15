<?php

namespace app\src;


use app\controllers\AuthController;
use app\controllers\SiteController;

Class Routes
{
    final public static function setRoutes(): bool
    {
        Application::$app->router->get('/', [SiteController::class, 'showHome']);
        Application::$app->router->get('/login', [AuthController::class, 'login']);
        Application::$app->router->post('/login', [AuthController::class, 'login']);
        Application::$app->router->get('/register', [AuthController::class, 'register']);
        Application::$app->router->post('/register', [AuthController::class, 'register']);
        Application::$app->router->get('/logout', [AuthController::class, 'logout']);
        Application::$app->router->get('/profile', [AuthController::class, 'profile']);
        return true;
    }
}