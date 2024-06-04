<?php

namespace App\DIContainer;

use Exception;
use Closure;

class UserSignupDIContainer
{
    public $container = [];

    public function set(string $name, object $service)
    {
        $this->container[$name] = $service;
    }

    public function get($name)
    {
        if (!isset($this->container[$name])) {
            throw new Exception("Service '$name' not found in the container.");
        }

        if ($this->container[$name] instanceof Closure) {
            return $this->container[$name]();
        }

        return $this->container[$name]::class;
    }
}
