<?php


namespace app\src;


class Controller
{
    public string $layout = 'main';

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

}