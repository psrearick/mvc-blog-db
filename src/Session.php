<?php


namespace app\src;


class Session
{

    protected const MESSAGE_KEY = 'messages';

    public function __construct()
    {
        session_start();
        $messages = $_SESSION[self::MESSAGE_KEY] ?? [];
        foreach ($messages as $key => &$message) {
            $message['remove'] = true;
        }
        $_SESSION[self::MESSAGE_KEY] = $messages;
    }

    public function setMessage($key, $message)
    {
        $_SESSION[self::MESSAGE_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getMessage($key)
    {
        return $_SESSION[self::MESSAGE_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        $messages = $_SESSION[self::MESSAGE_KEY] ?? [];
        foreach ($messages as $key => &$message) {
            if ($message['remove']) {
                unset($messages[$key]);
            }
        }
        $_SESSION[self::MESSAGE_KEY] = $messages;
    }
}