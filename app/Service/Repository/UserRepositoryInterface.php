<?php

namespace App\Service\Repository;

use App\DTO\UserSignupDTO;
use App\Model\UserModel;
use PDOException;
use PDOStatement;

interface UserRepositoryInterface
{
    function save(UserSignupDTO $userSignupDTO): PDOStatement | PDOException;
    function find(int $id): UserModel;
    function findAll(): array;
    function change(UserModel $user): bool;
    function remove(int $id): bool;
}
