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
    final public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    final public function render(string $view, $params = []): string
    {
        return Application::$app->view->render($view, $params);
    }

    final public function registerMiddleware(Middleware $middleware): void
    {
        $this->middleware[] = $middleware;
    }

    /**
     * @return Middleware[]
     */
    final public function getMiddleware(): array
    {
        return $this->middleware;
    }

}