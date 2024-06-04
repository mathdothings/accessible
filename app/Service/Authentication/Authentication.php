<?php

namespace App\Service\Authentication;

class Authentication
{
    static function authenticate(): bool
    {
        return (isset($_SESSION['userId'])) ? true : false;
    }
}
