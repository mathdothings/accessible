<?php

namespace App\Service\Repository;

use PDO;
use App\Service\Database\DatabaseInterface;
use App\Entity\UserEntity;
use App\DTO\UserSignupDTO;
use PDOException;
use PDOStatement;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(public DatabaseInterface $Database) {}

    public function find(int $id): UserEntity
    {
        $user = $this->Database->query(
            'SELECT * FROM user WHERE id = :id LIMIT 1',
            [
                ['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT]
            ]
        )->fetch(PDO::FETCH_ASSOC);

        return new UserEntity($user['id'], $user['email'], $user['name'], $user['passwordHash']);
    }

    public function findAll(): array
    {
        $users = $this->Database->query(
            'SELECT * FROM user'
        )->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($users as $user) {
            $result[] = new UserEntity($user['id'], $user['email'], $user['name'], $user['passwordHash']);
        }

        return $result;
    }

    public function save(UserSignupDTO $user): PDOStatement|PDOException
    {
        return $this->Database->query(
            'INSERT INTO user (email, name, passwordHash) VALUES (:email, :name, :passwordHash)',
            [
                [
                    'key' => 'email',
                    'value' => $user->Email,
                    'type' => PDO::PARAM_STR
                ],
                [
                    'key' => 'name',
                    'value' => $user->Name,
                    'type' => PDO::PARAM_STR
                ],
                [
                    'key' => 'passwordHash',
                    'value' => password_hash($user->Password, PASSWORD_DEFAULT),
                    'type' => PDO::PARAM_STR
                ]
            ]
        );
    }

    public function change(UserEntity $user): bool
    {
        $this->Database->query(
            'UPDATE user SET email = :email, name = :name, passwordHash = :passwordHash WHERE id = :id',
            [
                ['key' => 'id', 'value' => $user->Id, 'type' => PDO::PARAM_INT],
                ['key' => 'email', 'value' => $user->Email, 'type' => PDO::PARAM_STR],
                ['key' => 'name', 'value' => $user->Name, 'type' => PDO::PARAM_STR],
                ['key' => 'passwordHash', 'value' => $user->PasswordHash, 'type' => PDO::PARAM_STR]
            ]
        );

        return true;
    }

    public function remove(int $id): bool
    {
        $this->Database->query(
            'DELETE FROM user WHERE id = :id',
            [
                ['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT],
            ]
        );

        return true;
    }
}
