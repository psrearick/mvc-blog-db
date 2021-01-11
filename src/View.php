<?php


namespace app\src;


class View
{
    public string $title = "";

    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function render($view, $params = [])
    {
        $viewContent = $this->renderView($view, $params);
        $layoutContent = $this->layoutContent();
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