<?php

namespace App\Enum;

enum ViewsPath: string
{
    case Home = 'app/view/home/home.view.php';
    case Login = 'app/view/login/login.view.php';
    case Signup = 'app/view/signup/signup.view.php';
}
