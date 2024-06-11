<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;
use App\Trait\UserValidation;

class UserSignupValidation implements UserSignupValidationInterface
{
    use UserValidation;
    static public function validate(UserSignupDTO $userSignupDTO): bool
    {
        if (!self::validateName($userSignupDTO->Name)) return false;
        if (!self::validateEmail($userSignupDTO->Email)) return false;
        if (!self::validatePassword($userSignupDTO->Password)) return false;
        if (!self::validateRepeatPassword($userSignupDTO->Password, $userSignupDTO->RepeatPassword)) return false;

        return true;
    }
}
