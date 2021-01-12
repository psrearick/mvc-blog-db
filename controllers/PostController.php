<?php

namespace app\controllers;

use app\models\Category;
use app\models\Post;
use app\models\Tag;
use app\src\Application;
use app\src\Controller;
use app\src\exception\ForbiddenException;
use app\src\middleware\AuthMiddleware;
use app\src\Request;
use app\src\Response;

class PostController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['createPost', 'editPost']));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $identifier
     * @return string|string[]
     */
    final public function showPosts(Request $request, Response $response, array $identifier = []): string
    {
        $post = new Post();
        $cond = [];
        $params = [];
        $req = explode('/', $request->getPath());
        if (count($req) === 4) {
            $type = $req[2];
            $params['type'] = $type;
            $identifier = $identifier['name'];
            $params['condition'] = $identifier;
            if ($type === 'category') {
                $category = new Category();
                $category->findOne(['category' => $identifier]);
                $cond = ['category_id' => $category->id];
            } else {
                $tag = new Tag();
                $tag->findOne(['tagName' => $identifier]);
                $cond = [['tags' => $tag->id, 'operator' => 'in']];
            }
        }

        $posts = $post->findAll($cond);

        $params['posts'] = $posts;

        if (empty($req[1])){
            return $this->render('home', $params);
        } else {
            return $this->render('posts', $params);
        }
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
            if ($post->validate() && $post->save()) {
                Application::$app->session->setMessage('success', 'Blog post created');
                Application::$app->response->redirect("/post/{$post->slug}");
                return true;
            }
        }

        return $this->render('create-post', [
            'model' => $post,
            'categories' => $this->getCategorySelect(),
            'tags' => $this->getTagSelect()
        ]);
    }

    /**
     * @return array
     */
    final public function getCategorySelect()
    {
        $category = new Category();
        $categoryArrays = $category->findAll([]);
        $categories = [];
        foreach ($categoryArrays as $categoryArray) {
            $categories[] = ['id' => $categoryArray['id'], 'value' => $categoryArray['category']];
        }
        return $categories;
    }

    /**
     * @return array
     */
    final public function getTagSelect()
    {
        $tag = new Tag();
        $tagArrays = $tag->findAll([]);
        $tags = [];
        foreach ($tagArrays as $tagArray) {
            $tags[] = ['id' => $tagArray['id'], 'value' => $tagArray['tagName']];
        }
        return $tags;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $slug
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
            if ($post->validate() && $post->save()) {
                Application::$app->session->setMessage('success', 'Blog post modified');
                Application::$app->response->redirect("/post/{$post->slug}");
                return true;
            }
        }
        return $this->render('edit-post', [
            'model' => $post,
            'categories' => $this->getCategorySelect(),
            'tags' => $this->getTagSelect()
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
            'model' => $post,
        ]);
    }
}