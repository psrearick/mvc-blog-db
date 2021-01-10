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

    /**
     * @param $key
     * @param $message
     */
    public function setMessage($key, $message)
    {
        $_SESSION[self::MESSAGE_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    /**
     * @param $key
     * @return false|mixed
     */
    public function getMessage($key)
    {
        return $_SESSION[self::MESSAGE_KEY][$key]['value'] ?? false;
    }

    /**
     * Set a value in the session
     *
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a value from the session
     *
     * @param string $key
     * @return false|mixed
     */
    public function get(string $key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Clear out session
     */
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
