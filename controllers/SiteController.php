<?php

namespace app\controllers;

use app\models\CreatePostForm;
use app\src\Application;
use app\src\Controller;
use app\src\Request;

class SiteController extends Controller
{
    public function showPosts()
    {
        $params = [
            'posts' => ['Post 1', 'Post 2']];
        return $this->render('home', $params);
    }

    public function createPost(Request $request)
    {
        $create = new CreatePostForm();
        if ($request->isPost()) {
            $create->loadData($request->getBodyData());
            if ($create->validate() && $create->save()) {
                Application::$app->session->setMessage('success', 'Blog post created');
                return $response->redirect("/post/$create->{$create->primaryKey()}");
            }
        }
        return $this->render('create-post', [
            'model' => $create
        ]);
    }

    public static function handleCreatePost(Request $request)
    {
        $request = $request->getBodyData();
    }
}