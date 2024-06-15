<?php

namespace App\View;

use App\Enum\ViewsPath;

class View
{
    static function render(string $path, array $errors = null): void
    {
        require_once ROOT . $path;
        die;
    }

    static function home(): void
    {
        self::render(ViewsPath::Home->value);
    }

    static function login(): void
    {
        self::render(ViewsPath::Login->value);
    }

    static function signup(?array $errors): void
    {
        self::render(ViewsPath::Signup->value, $errors);
    }
}
