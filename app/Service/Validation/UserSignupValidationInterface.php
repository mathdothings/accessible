<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;

interface UserSignupValidationInterface
{
    static public function validate(UserSignupDTO $userSignupDTO): bool | array;
}
