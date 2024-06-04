<?php

namespace App\DTO;

class UserSignupDTO
{
    public readonly string $Name;
    public readonly string $Email;
    public readonly string $Password;
    public readonly string $RepeatPassword;

    function __construct(array $userSignupInput)
    {
        $this->Name = $userSignupInput['name'];
        $this->Email = $userSignupInput['email'];
        $this->Password = $userSignupInput['password'];
        $this->RepeatPassword = $userSignupInput['repeatPassword'];
    }
}
