<?php

namespace app\src;

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
     * Read current path to determine which route to return
     * then call the callback for that path
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return "Not found";
        }

        if (is_string($callback)){
            return $this->render($callback);
        }

        return call_user_func($callback);
    }

    /**
     * @param $view
     */
    public function render($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * @return false|string
     * cache and return current layout
     */
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT . "/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderView($view)
    {
        ob_start();
        include_once Application::$ROOT . "/views/$view.php";
        return ob_get_clean();
    }
}