<?php

namespace App\Trait;

trait UserValidation
{
    private const ALLOWED_CHARS = '/\d*\s*[a-zA-Z]*/';
    private const ALLOWED_SPECIAL_CHARS = '/^[\.\-_]*@{1}\.{1,2}$/';

    static function isValidName(string $name): bool
    {
        if (empty($name)) return false;
        if (strlen($name) < 3) return false;

        return true;
    }

    static function isValidEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;

        $symbolsOnly = preg_replace(self::ALLOWED_CHARS, '', $email);
        if (!preg_match(self::ALLOWED_SPECIAL_CHARS, $symbolsOnly) && $symbolsOnly != '') return false;

        return true;
    }

    static function isValidPassword(string $password): bool
    {
        if (strlen($password) < 8) return false;
        if (!preg_match("/[a-z]/i", $password)) return false;
        if (!preg_match("/[A-Z]/", $password)) return false;
        if (!preg_match("/[0-9]/", $password)) return false;

        return true;
    }

    static function isValidRepeatPassword(string $password, string $repeatPassword): bool
    {
        if ($password !== $repeatPassword) return false;

        return true;
    }
}
