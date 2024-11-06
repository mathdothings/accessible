<?php

namespace App\Entity;

class UserEntity
{
    public function __construct(
        public int $Id,
        public string $Email,
        public string $Name,
        public string $PasswordHash
    ) {}
}
