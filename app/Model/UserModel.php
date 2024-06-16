<?php

namespace App\Model;

class UserModel
{
    public function __construct(
        public int $Id,
        public string $Email,
        public string $Name,
        public string $PasswordHash
    ) {
    }
}
