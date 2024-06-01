<?php

namespace App\Service;

class Authentication
{
    static function authenticate(): bool
    {
        return (isset($_SESSION['userId'])) ? true : false;
    }
}
