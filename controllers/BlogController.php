<?php

namespace app\controllers;

use app\models\Post;
use app\src\Application;
use app\src\Controller;
use app\src\middleware\AuthMiddleware;
use app\src\Request;
use app\src\Response;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['createPost']));
    }

    /**
     * @return string|string[]
     */
    public function showPosts()
    {
        $params = [
            'posts' => ['Post 1', 'Post 2']];
        return $this->render('home', $params);
    }

    /**
     * @param Request $request
     * @return string|string[]
     */
    public function createPost(Request $request)
    {
        $post = new Post();
        if ($request->isPost()) {
            $data = $request->getBodyData();
            $data['user_id'] = Application::$app->user->id;
            $post->loadData($data);
            if ($post->validate() && $post->save()) {
                Application::$app->session->setMessage('success', 'Blog post created');
                Application::$app->response->redirect("/post/{$post->primaryKey()}");
                return true;
            }
        }
        return $this->render('create-post', [
            'model' => $post
        ]);
    }

    public function post(Request $request, Response $response, $id)
    {
        $post = new Post();
        $post->findOne(['id' => (int)$id]);
        return $this->render('post', [
            'model' => $post
        ]);
    }
}