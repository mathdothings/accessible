<?php

namespace App\Enum;

enum UserLoginErrors: string
{
    case Email = 'Invalid email!';
    case EmailSpecialChars = 'Use of invalid symbol on emails address!';
    case PasswordLength = 'Password must have more than 7 digits!';
    case PasswordLowerCaseLetters = 'Password must have one or more lowercase letters!';
    case PasswordUpperCaseLetters = 'Password must have one or more uppercase letters!';
    case PasswordNumericalDigits = 'Password must have one or more numerical digits!';
}
