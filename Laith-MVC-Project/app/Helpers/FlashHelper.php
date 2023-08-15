<?php 

class FlashHelper
{
    public static function set($key, $value)
    {
        if (!isset($_SESSION['flash_messages'])) {
            $_SESSION['flash_messages'] = [];
        }
        $_SESSION['flash_messages'][$key] = [
            'message' => $value,
            'timestamp' => time()
        ];
    }

    public static function get($key)
    {
        if (isset($_SESSION['flash_messages'][$key])) {
            $message = $_SESSION['flash_messages'][$key];
            unset($_SESSION['flash_messages'][$key]);
            if (time() - $message['timestamp'] <= 5) {
                return $message['message'];
            }
        }
        return null;
    }

    public static function has($key)
    {
        return isset($_SESSION['flash_messages'][$key]);
    }
}
