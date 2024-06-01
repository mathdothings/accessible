<?php

namespace App\Enum;

enum ViewsPath: string
{
    case Home = 'app/View/home/home.view.php';
    case Login = 'app/View/login/login.view.php';
    case Signup = 'app/View/signup/signup.view.php';
}
