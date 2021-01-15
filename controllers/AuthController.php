<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\User;
use app\src\Application;
use app\src\Controller;
use app\src\middleware\AuthMiddleware;
use app\src\Request;
use app\src\Response;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return string
     */
    final public function login(Request $request, Response $response): string
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBodyData());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->session->setMessage('success', 'You have logged in');
                $response->redirect('/');
                return true;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    /**
     * @param Request $request
     * @return string
     */
    final public function register(Request $request): string
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBodyData());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setMessage('success', 'You have been registered');
                Application::$app->response->redirect('/');
                return true;
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return bool
     */
    final public function logout(Request $request, Response $response): bool
    {
        Application::$app->logout();
        $response->redirect('/');
        return true;
    }

    final public function profile(): string
    {
        return $this->render('profile', [
            'model' => Application::$app->user
        ]);
    }

}