<?php

namespace App\Service\Validation;

use App\DTO\UserSignupDTO;

interface UserSignupValidationInterface
{
    static public function isValid(UserSignupDTO $userSignupDTO): bool | array;
}
