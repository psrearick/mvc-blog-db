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
    protected array $wild_cards = ['int' => '/^[0-9]+$/', 'any' => '/^[0-9A-Za-z]+$/'];

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
        $this->routes['get'][$this->buildPath($path)] = $callback;
    }

    /**
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$this->buildPath($path)] = $callback;
    }

    /**
     * @param $route
     * @return string
     */
    protected function buildPath($route): string
    {
        if ($route == '/') {
            return $this->request->getBasePath();
        }
        return $this->request->getBasePath() . $route;
    }

    /**
     * match wild cards in current path to supplied route
     *
     * @param $route
     * @return array|false
     */
    protected function match_wild_cards($route) {
        $variables = [];

        $exp_request = explode('/', $this->request->getPath());
        $exp_route = explode('/', $route);

        if (count($exp_request) === count($exp_route)) {
            foreach ($exp_route as $key => $value) {
                if ($value === $exp_request[$key]) {
                    continue;
                }
                elseif ($value[0] === '(' && substr($value, -1) === ')') {
                    $strip = str_replace(array('(', ')'), '', $value);
                    $exp = explode(':', $strip);

                    if (array_key_exists($exp[0], $this->wild_cards)) {
                        $pattern = $this->wild_cards[$exp[0]];

                        if (preg_match($pattern, $exp_request[$key])) {
                            if (isset($exp[1])) {
                                $variables[$exp[1]] = $exp_request[$key];
                            }

                            continue;
                        }
                    }
                }

                return false;
            }

            return $variables;
        }

        return false;
    }

    /**
     * Read current path to determine which route to return
     * then call the callback for that path
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = false;
        $callbackVars = false;


        foreach ($this->routes[$method] as $route => $routeCallback) {
            $vars = $this->match_wild_cards($route);
            if ($vars) {
                $callback = $routeCallback ?? false;
                $callbackVars = $vars;
                break;
            }
            if ($route === $path) {
                $callback = $routeCallback ?? false;
            }
        }

        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)){
            return Application::$app->view->render($callback);
        }

        if (is_array($callback)) {
            /** @var Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            foreach ($controller->getMiddleware() as $item) {
                $item->execute();
            }
            $callback[0] = $controller;
        }

        if ($callbackVars !== false) {
            return call_user_func($callback, $this->request, $this->response, $callbackVars);
        }
        return call_user_func($callback, $this->request, $this->response);
    }
}