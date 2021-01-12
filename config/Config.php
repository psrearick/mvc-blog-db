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
        // TODO: Here is where we would read the .env to get information such as database credentials
        return [
            'userClass' => User::class,
            'start_logged_in' => false,
            'site_name' => 'PSRearick Blog'
        ];
    }
}
