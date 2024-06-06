<?php

namespace App\DIContainer;

use Exception;
use Closure;

class UserSignupDIContainer
{
    static private $container = [];

    public static function set(string $name, callable $callback)
    {
        self::$container[$name] = $callback();
    }

    public static function setDefinitions(array $definitions)
    {
        self::$container = $definitions;
    }

    public static function getKnownDefinitions()
    {
        $result = [];

        foreach (self::$container as $key => $value) {
            if (!isset($key[$value])) {
                throw new Exception("Service '$key[$value]' not found in the container.");
            }

            if ($key[$value] instanceof Closure) {
                return $key[$value]();
            }
        }

        $className = $key[$value]::class;
        $result[] = $className();

        return $result;
    }

    static public function get($name)
    {
        if (!isset(self::$container[$name])) {
            throw new Exception("Service '$name' not found in the container.");
        }

        if (self::$container[$name] instanceof Closure) {
            return self::$container[$name]();
        }

        $className = self::$container[$name]::class;
        return new $className();
    }
}
