<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;
use App\Trait\UserValidation;

class UserSignupValidation implements UserSignupValidationInterface
{
    use UserValidation;
    static public function validate(UserSignupDTO $userSignupDTO): bool
    {
        if (!self::isValidName($userSignupDTO->Name)) return false;
        if (!self::isValidEmail($userSignupDTO->Email)) return false;
        if (!self::isValidPassword($userSignupDTO->Password)) return false;
        if (!self::isValidRepeatPassword($userSignupDTO->Password, $userSignupDTO->RepeatPassword)) return false;

        return true;
    }
}
