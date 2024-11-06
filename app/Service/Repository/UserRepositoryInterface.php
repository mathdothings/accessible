<?php

namespace App\Service\Repository;

use App\DTO\UserSignupDTO;
use App\Entity\UserEntity;
use PDOException;
use PDOStatement;

interface UserRepositoryInterface
{
    function save(UserSignupDTO $userSignupDTO): PDOStatement | PDOException;
    function find(int $id): UserEntity;
    function findAll(): array;
    function change(UserEntity $user): bool;
    function remove(int $id): bool;
}
