<?php

namespace app\src;

use app\src\exception\NotFoundException;

/**
 * Class Router
 * @package app\src
 */
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];


    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    /**
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }


    /**
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    /**
     * Read current path to determine which route to return
     * then call the callback for that path
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)){
            return $this->render($callback);
        }

        if (is_array($callback)) {
            /** @var \app\src\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            foreach ($controller->getMiddleware() as $item) {
                $item->execute();
            }
            $callback[0] = $controller;

        }

        return call_user_func($callback, $this->request, $this->response);
    }


    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function render($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    /**
     * @return false|string
     * cache and return current layout
     */
    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller){
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT . "/views/layouts/$layout.php";
        return ob_get_clean();
    }


    /**
     * @param $view
     * @param $params
     * @return false|string
     */
    protected function renderView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT . "/views/$view.php";
        return ob_get_clean();
    }
}