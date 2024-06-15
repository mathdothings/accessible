<?php

namespace App\Trait;

use App\Enum\UserSignupErrors;

trait UserValidation
{
    static private string $ALLOWED_CHARS = '/\d*\s*[a-zA-Z]*/';
    static private string $ALLOWED_SPECIAL_CHARS = '/^[\.\-_]*@{1}\.{1,2}$/';

    static private array $errors = [];
    static private int $count;

    static function isValidName(string $name): bool
    {
        self::$count = 0;

        if (empty($name)) {
            self::$errors[] = UserSignupErrors::EmptyName;
            self::$count++;
        }

        if (strlen($name) < 3) {
            self::$errors[] = UserSignupErrors::NameLength;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidEmail(string $email): bool
    {
        self::$count = 0;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            self::$errors[] = UserSignupErrors::Email;
            self::$count++;
        }

        $symbolsOnly = preg_replace(self::$ALLOWED_CHARS, '', $email);
        if (!preg_match(self::$ALLOWED_SPECIAL_CHARS, $symbolsOnly) && $symbolsOnly != '') {
            self::$errors[] = UserSignupErrors::EmailSpecialChars;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidPassword(string $password): bool
    {
        self::$count = 0;

        if (strlen($password) < 8) {
            self::$errors[] = UserSignupErrors::PasswordLength;
            self::$count++;
        }

        if (!preg_match("/[a-z]/i", $password)) {
            self::$errors[] = UserSignupErrors::PasswordLowerCaseLetters;
            self::$count++;
        }

        if (!preg_match("/[A-Z]/", $password)) {
            self::$errors[] = UserSignupErrors::PasswordUpperCaseLetters;
            self::$count++;
        }

        if (!preg_match("/[0-9]/", $password)) {
            self::$errors[] = UserSignupErrors::PasswordNumericalDigits;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidRepeatPassword(string $password, string $repeatPassword): bool
    {
        self::$count = 0;

        if ($password !== $repeatPassword) {
            self::$errors[] = UserSignupErrors::RepeatPassword;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValid(): bool | array {
        if (empty(self::$errors)) return true;
        return self::$errors;
    }
}
