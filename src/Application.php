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
    public ?UserModel $user = null;
    public static Application $app;
    public ?Controller $controller = null;
    public User $userClass;
    public View $view;
    public array $config;

    public function __construct(string $root, array $conf)
    {
        self::$ROOT = $root;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->config = $conf;
        $this->userClass = new $this->config['userClass'];
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass->primaryKey();
            $this->user = $this->userClass->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    /**
     * @return bool
     */
    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    /**
     *
     */
    final public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->render('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return Controller
     */
    final public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    final public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param UserModel $user
     * @return bool
     */
    final public function login(UserModel $user): bool
    {
        $this->user = $user;
        $key = $user->primaryKey();
        $value = $user->{$key};
        $this->session->set('user', $value);
        return true;
    }

    /**
     * @return bool
     */
    final public function logout(): bool
    {
        $this->user = null;
        $this->session->remove('user');
        return true;
    }
}