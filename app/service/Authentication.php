<?php

use App\Service\Router;

class Authentication
{
    static function authenticate(): bool
    {
        return (isset($_SESSION['userId'])) ? true : false;
    }
}
