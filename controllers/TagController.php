<?php

namespace app\controllers;


use app\models\Tag;
use core\Application;
use core\Controller;
use core\middleware\AuthMiddleware;
use core\Request;
use core\Response;

class TagController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['createTag', 'editTag']));
    }

    /**
     * @return string|string[]
     */
    final public function showTags(): string
    {
        $tag = new Tag();
        $params = [
            'tags' => $tag->findAll([])
        ];
        return $this->render('tags', $params);
    }

    /**
     * @param Request $request
     * @return string
     */
    final public function createTag(Request $request): string
    {
        $tag = new Tag();
        if ($request->isPost()) {
            $data = $request->getBodyData();
            $tag->loadData($data);
            if ($tag->validate() && $tag->save()) {
                Application::$app->session->setMessage('success', 'Tag created');
                Application::$app->response->redirect("/posts/tag/{$tag->tagName}");
                return true;
            }
        }

        return $this->render('create-tag', [
            'model' => $tag
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $tagName
     * @return bool|string|string[]
     */
    final public function editTag(Request $request, Response $response, array $tagName): string
    {
        $name= $tagName['name'];
        $tag = new Tag();
        $tag->findOne(['tagName' => $name]);

        if ($request->isPost()) {
            $data = $request->getBodyData();
            $tag->loadData($data);
            if ($tag->validate() && $tag->save()) {
                Application::$app->session->setMessage('success', 'Tag modified');
                Application::$app->response->redirect("/posts/tag/{$tag->tagName}");
                return true;
            }
        }

        return $this->render('edit-tag', [
            'model' => $tag
        ]);
    }

}
