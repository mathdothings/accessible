<?php

namespace App\Service\Repository;

use App\DTO\UserSignupDTO;
use App\Model\UserModel;

interface UserRepositoryInterface
{
    function save(UserSignupDTO $userSignupDTO): bool;
    function find(int $id): UserModel;
    function findAll(): array;
    function change(UserModel $user): bool;
    function remove(UserSignupDTO $user): bool;
}
