<?php

namespace app\src;


use app\controllers\AuthController;
use app\controllers\PostController;
use app\controllers\CategoryController;
use app\controllers\TagController;

Class Routes
{
    final public static function setRoutes(): bool
    {
        Application::$app->router->get('/', [PostController::class, 'showPosts']);
        Application::$app->router->get('/posts/category/(any:name)', [PostController::class, 'showPosts']);
        Application::$app->router->get('/posts/category', [PostController::class, 'showPosts']);
        Application::$app->router->get('/posts/tag/(any:name)', [PostController::class, 'showPosts']);
        Application::$app->router->get('/posts/tag', [PostController::class, 'showPosts']);
        Application::$app->router->get('/posts', [PostController::class, 'showPosts']);
        Application::$app->router->get('/post/(any:name)', [PostController::class, 'post']);
        Application::$app->router->get('/create-post', [PostController::class, 'createPost']);
        Application::$app->router->post('/create-post', [PostController::class, 'createPost']);
        Application::$app->router->get('/edit-post/(any:name)', [PostController::class, 'editPost']);
        Application::$app->router->post('/edit-post/(any:name)', [PostController::class, 'editPost']);

        Application::$app->router->get('/tags', [TagController::class, 'showTags']);
        Application::$app->router->get('/tags/(any:name)', [TagController::class, 'showTags']);
        Application::$app->router->get('/create-tag', [TagController::class, 'createTag']);
        Application::$app->router->post('/create-tag', [TagController::class, 'createTag']);
        Application::$app->router->get('/edit-tag/(any:name)', [TagController::class, 'editTag']);
        Application::$app->router->post('/edit-tag/(any:name)', [TagController::class, 'editTag']);

        Application::$app->router->get('/categories', [CategoryController::class, 'showCategories']);
        Application::$app->router->get('/categories/(any:name)', [CategoryController::class, 'showCategories']);
        Application::$app->router->get('/create-category', [CategoryController::class, 'createCategory']);
        Application::$app->router->post('/create-category', [CategoryController::class, 'createCategory']);
        Application::$app->router->get('/edit-category/(any:name)', [CategoryController::class, 'editCategory']);
        Application::$app->router->post('/edit-category/(any:name)', [CategoryController::class, 'editCategory']);

        Application::$app->router->get('/login', [AuthController::class, 'login']);
        Application::$app->router->post('/login', [AuthController::class, 'login']);
        Application::$app->router->get('/register', [AuthController::class, 'register']);
        Application::$app->router->post('/register', [AuthController::class, 'register']);
        Application::$app->router->get('/logout', [AuthController::class, 'logout']);
        Application::$app->router->get('/profile', [AuthController::class, 'profile']);
        return true;
    }
}