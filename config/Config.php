<?php

namespace app\config;

use app\models\User;

class Config
{
    /**
     * @return array
     */
    final public function getConfig(): array
    {
        $userClass = "app\models\\" . $_ENV['USERCLASS'];
        return [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ],
            'userClass' => new $userClass(),
            'site_name' => $_ENV['SITE_NAME']
        ];
    }
}
