<?php 

class SessionHelper
{
    /**
     * Start the session.
     */
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set a session variable.
     *
     * @param string $key   The key of the session variable.
     * @param mixed  $value The value to be stored in the session variable.
     */
    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    /**
     * Get the value of a session variable.
     *
     * @param string $key     The key of the session variable.
     * @param mixed  $default The default value to be returned if the session variable doesn't exist.
     *
     * @return mixed The value of the session variable, or the default value if it doesn't exist.
     */
    public static function get($key, $default = null)
    {
        self::start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Check if a session variable exists.
     *
     * @param string $key The key of the session variable.
     *
     * @return bool True if the session variable exists, false otherwise.
     */
    public static function has($key)
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    /**
     * Remove a session variable.
     *
     * @param string $key The key of the session variable.
     */
    public static function remove($key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

    /**
     * Destroy the session.
     */
    public static function destroy()
    {
        self::start();
        session_unset();
        session_destroy();
    }

     /**
     * Check if a session variable exists and matches a specific role.
     *
     * @param string $key  The key of the session variable.
     * @param string $role The role to check against.
     *
     * @return bool True if the session variable exists and matches the role, false otherwise.
     */
    public static function hasRole($key, $role)
    {
        self::start();
        return isset($_SESSION[$key]) && $_SESSION[$key] === $role;
    }

}
