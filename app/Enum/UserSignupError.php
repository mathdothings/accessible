<?php

namespace App\Enum;

enum UserSignupErrors: string
{
    case EmptyName = 'Name must be provided!';
    case NameLength = 'Name must be greater than 3 charactes!';
    case RepeatPassword = "Passwords don't match!";
}
