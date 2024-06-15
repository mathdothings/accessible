<?php

namespace App\Trait;

use App\Enum\UserSignupErrors as Label;

trait UserValidation
{
    static private string $ALLOWED_CHARS = '/\d*\s*[a-zA-Z]*/';
    static private string $ALLOWED_SPECIAL_CHARS = '/^[\.\-_]*@{1}\.{1,2}$/';

    static private array $errors = [
        'name' => [],
        'email' => [],
        'password' => [],
        'repeatPassword' => ''
    ];

    static private int $count;

    static function isValidName(string $name): bool
    {
        self::$count = 0;

        if (empty($name)) {
            self::$errors['name'][Label::EmptyName->name] = Label::EmptyName->value;
            self::$count++;
        }

        if (strlen($name) < 3) {
            self::$errors['name'][Label::NameLength->name] = Label::NameLength->value;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidEmail(string $email): bool
    {
        self::$count = 0;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            self::$errors['email'][Label::Email->name] = Label::Email->value;
            self::$count++;
        }

        $symbolsOnly = preg_replace(self::$ALLOWED_CHARS, '', $email);
        if (!preg_match(self::$ALLOWED_SPECIAL_CHARS, $symbolsOnly) && $symbolsOnly != '') {
            self::$errors['email'][Label::EmailSpecialChars->name] = Label::EmailSpecialChars->value;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidPassword(string $password): bool
    {
        self::$count = 0;

        if (strlen($password) < 8) {
            self::$errors['password'][Label::PasswordLength->name] = Label::PasswordLength->value;
            self::$count++;
        }

        if (!preg_match("/[a-z]/i", $password)) {
            self::$errors['password'][Label::PasswordLowerCaseLetters->name] = Label::PasswordLowerCaseLetters->value;
            self::$count++;
        }

        if (!preg_match("/[A-Z]/", $password)) {
            self::$errors['password'][Label::PasswordUpperCaseLetters->name] = Label::PasswordUpperCaseLetters->value;
            self::$count++;
        }

        if (!preg_match("/[0-9]/", $password)) {
            self::$errors['password'][Label::PasswordNumericalDigits->name] = Label::PasswordNumericalDigits->value;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function isValidRepeatPassword(string $password, string $repeatPassword): bool
    {
        self::$count = 0;

        if ($password !== $repeatPassword) {
            self::$errors['repeatPassword'] = Label::RepeatPassword->value;
            self::$count++;
        }

        if (self::$count > 0) return false;

        return true;
    }

    static function validate(): bool | array {
        if (empty(self::$errors)) return true;
        return self::$errors;
    }
}
