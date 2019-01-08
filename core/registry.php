<?php

class Registry
{
    private static $_data = array();

    public static function set($key, $value)
    {
        self::$_data[$key] = $value;
    }

    public static function get($key)
    {
        if (!isset(self::$_data[$key])){
            throw new Exception('Не найден' . $key);
        } else {
            return self::$_data[$key];
        }
    }
}