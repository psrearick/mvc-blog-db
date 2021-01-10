<?php

namespace app\src;

use app\models\User;

/**
 * Class Application
 * @package app\src
 */
class Application
{
    public static string $ROOT;

    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public ?DbModel $user = null;
    public static Application $app;
    public ?Controller $controller = null;
    public User $userClass;

    public function __construct($root, array $conf)
    {
        self::$ROOT = $root;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->userClass = new $conf['userClass'];
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass->primaryKey();
            $this->user = $this->userClass->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    /**
     *
     */
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->render('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param DbModel $user
     */
    public function login(DbModel $user)
    {
        $this->user = $user;
        $key = $user->primaryKey();
        $value = $user->{$key};
        $this->session->set('user', $value);
        return true;
    }

    /**
     */
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}