<?php

namespace App\DTO;

class UserLoginDTO
{
    public readonly string $Email;
    public readonly string $Password;

    function __construct(array $userLoginInput)
    {
        $this->Email = $userLoginInput['email'];
        $this->Password = $userLoginInput['password'];
    }
}
