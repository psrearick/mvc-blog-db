<?php

namespace app\controllers;

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

    public function createPost()
    {
        return $this->render('create-post');
    }

    public static function handleCreatePost(Request $request)
    {
        $request = $request->getBodyData();
        echo '<pre>';
        var_dump($request);
        echo '</pre>';
        exit();
        return 'creating post';
    }
}