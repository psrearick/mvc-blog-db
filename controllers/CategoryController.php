<?php


namespace app\controllers;


use core\Controller;
use core\Application;
use app\models\Category;
use core\middleware\AuthMiddleware;
use core\Request;
use core\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['createCategory', 'editCategory']));
    }

    /**
     * @return string|string[]
     */
    final public function showCategories()
    {
        $category = new Category();
        $params = [
            'categories' => $category->findAll([])
        ];
        return $this->render('categories', $params);
    }

    /**
     * @param Request $request
     * @return string
     */
    final public function createCategory(Request $request): string
    {
        $category = new Category();
        if ($request->isPost()) {
            $data = $request->getBodyData();
            $category->loadData($data);
            if ($category->validate() && $category->save()) {
                Application::$app->session->setMessage('success', 'Category created');
                Application::$app->response->redirect("/posts/category/{$category->category}");
                return true;
            }
        }

        return $this->render('create-category', [
            'model' => $category
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $category
     * @return bool|string|string[]
     */
    final public function editCategory(Request $request, Response $response, array $category): string
    {
        $name = $category['name'];
        $category = new Category();
        $category->findOne(['category' => $name]);

        if ($request->isPost()) {
            $data = $request->getBodyData();
            $category->loadData($data);
            if ($category->validate() && $category->save()) {
                Application::$app->session->setMessage('success', 'Category modified');
                Application::$app->response->redirect("/posts/category/{$category->category}");
                return true;
            }
        }

        return $this->render('edit-category', [
            'model' => $category
        ]);
    }
}