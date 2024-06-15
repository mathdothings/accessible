<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;
use App\Trait\UserValidation;

class UserSignupValidation implements UserSignupValidationInterface
{
    use UserValidation;

    static public function isValid(UserSignupDTO $userSignupDTO): bool | array
    {
        self::isValidName($userSignupDTO->Name);
        self::isValidEmail($userSignupDTO->Email);
        self::isValidPassword($userSignupDTO->Password);
        self::isValidRepeatPassword($userSignupDTO->Password, $userSignupDTO->RepeatPassword);

        return self::validate();
    }
}
