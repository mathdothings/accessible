<?php

namespace App\View;

use App\Enum\ViewsPath;

require_once ROOT . 'app/enum/ViewsPath.php';

class View
{
    static function render($path): void
    {
        require_once ROOT . $path;
    }

    static function home(): void
    {
        self::render(ViewsPath::Home->value);
    }

    static function login(): void
    {
        self::render(ViewsPath::Login->value);
    }

    static function signup(): void
    {
        self::render(ViewsPath::Signup->value);
    }
}
