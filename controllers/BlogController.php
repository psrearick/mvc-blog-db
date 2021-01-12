<?php

namespace app\controllers;

use app\models\Post;
use app\src\Application;
use app\src\Controller;
use app\src\exception\ForbiddenException;
use app\src\middleware\AuthMiddleware;
use app\src\Request;
use app\src\Response;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['createPost', 'editPost']));
    }

    /**
     * @return string|string[]
     */
    final public function showPosts(): string
    {
        $post = new Post();
        $params = [
            'posts' => $post->findAll([])
        ];
        return $this->render('home', $params);
    }

    /**
     * @param Request $request
     * @return string|string[]
     */
    final public function createPost(Request $request): string
    {
        $post = new Post();
        if ($request->isPost()) {
            $data = $request->getBodyData();
            $data['user_id'] = Application::$app->user->id;
            $post->loadData($data);
            $post->validate();
            if ($post->validate() && $post->save()) {
                Application::$app->session->setMessage('success', 'Blog post created');
                Application::$app->response->redirect("/post/{$post->slug}");
                return true;
            }
        }
        return $this->render('create-post', [
            'model' => $post
        ]);
    }

    /**
     * @param Request $request
     * @return string
     * @throws ForbiddenException
     */
    final public function editPost(Request $request, Response $response, array $slug):string
    {

        $post = new Post();
        $data = $request->getBodyData();
        $post->findOne(['slug' => $slug['name']]);
        if ($post->user_id !== Application::$app->user->id) {
            throw new ForbiddenException();
        }
        if ($request->isPost()) {
            $post->loadData($data);
            $post->validate();
            if ($post->validate() && $post->save()) {
                Application::$app->session->setMessage('success', 'Blog post modified');
                Application::$app->response->redirect("/post/{$post->slug}");
                return true;
            }
        }
        return $this->render('edit-post', [
            'model' => $post
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $slug
     * @return string
     */
    final public function post(Request $request, Response $response, array $slug): string
    {
        $post = new Post();
        $post->findOne(['slug' => $slug['name']]);
        return $this->render('post', [
            'model' => $post
        ]);
    }
}