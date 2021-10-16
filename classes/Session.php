<?php
class Session
{
    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function putArray($name1, $name2, $value)
    {
        return $_SESSION[$name1][$name2] = $value;
    }

    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function get($token)
    {
        return $_SESSION[$token];
    }

    public static function delete($token)
    {
        if (Session::exists($token)) {
            unset($_SESSION[$token]);
        }
    }

    public static function flash($name, $string = "")
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
        return "";
    }
}
