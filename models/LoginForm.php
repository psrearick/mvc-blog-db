<?php


namespace app\models;


use app\src\Application;
use app\src\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQ, self::RULE_EMAIL],
            'password' => [self::RULE_REQ]
        ];
    }

    /**
     * @return string[]
     */
    public function labels(): array
    {
        return [
            'email' => 'Email Address',
            'password' => 'Password'
        ];
    }

    /**
     * @return false|void
     */
    public function login()
    {
        $user = (new User)->findOne(['email' => $this->email]);
        if (!$user->id) {
            $this->addError('email', 'There is no user with this email address');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Incorrect Password');
            return false;
        }

        return Application::$app->login($user);
    }

}