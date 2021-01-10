<?php


namespace app\src;


use app\src\middleware\Middleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var Middleware[]
     */
    protected array $middleware = [];

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->render($view, $params);
    }

    public function registerMiddleware(Middleware $middleware)
    {
        $this->middleware[] = $middleware;
    }

    /**
     * @return Middleware[]
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

}