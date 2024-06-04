<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;

class UserSignupValidation implements UserSignupValidationInterface
{
    static public function validate(UserSignupDTO $userSignupDTO): bool|array
    {
        echo 'UserSignupValidation validate method';
        return true;
    }
}
