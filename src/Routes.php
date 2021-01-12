<?php

namespace app\src;


use app\controllers\AuthController;
use app\controllers\BlogController;

Class Routes
{
    final public static function setRoutes(): bool
    {
        Application::$app->router->get('/', [BlogController::class, 'showPosts']);
        Application::$app->router->get('/create-post', [BlogController::class, 'createPost']);
        Application::$app->router->post('/create-post', [BlogController::class, 'createPost']);
        Application::$app->router->get('/edit-post/(any:name)', [BlogController::class, 'editPost']);
        Application::$app->router->post('/edit-post/(any:name)', [BlogController::class, 'editPost']);
        Application::$app->router->get('/post/(any:name)', [BlogController::class, 'post']);
        Application::$app->router->get('/login', [AuthController::class, 'login']);
        Application::$app->router->post('/login', [AuthController::class, 'login']);
        Application::$app->router->get('/register', [AuthController::class, 'register']);
        Application::$app->router->post('/register', [AuthController::class, 'register']);
        Application::$app->router->get('/logout', [AuthController::class, 'logout']);
        Application::$app->router->get('/profile', [AuthController::class, 'profile']);
        return true;
    }
}