<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\User;
use app\src\Application;
use app\src\Controller;
use app\src\Request;
use app\src\Response;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
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

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBodyData());
            $valid = $user->validate();
            if ($valid && $user->save()) {
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
     */
    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

}