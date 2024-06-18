<?php

namespace App\Service\Repository;

use PDO;
use PDOException;
use App\Service\Database\DatabaseInterface;
use App\Model\UserModel;
use App\DTO\UserSignupDTO;

class UserRepository implements UserRepositoryInterface
{
    private PDO $Connection;
    public function __construct(public DatabaseInterface $Database)
    {
        $this->Connection = $Database->connect();
    }

    public function find(int $id): UserModel
    {
        $data = $this->Database->query(
            'SELECT * FROM user WHERE id = :id LIMIT 1',
            [
                ['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT],
            ]
        )->fetch(PDO::FETCH_ASSOC);

        return new UserModel($data['id'], $data['email'], $data['name'], $data['passwordHash']);
    }

    public function findAll(): array
    {
        $users = $this->Database->query(
            'SELECT * FROM user'
        )->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($users as $user) {
            $result[] = new UserModel($user['id'], $user['email'], $user['name'], $user['passwordHash']);
        }

        return $result;
    }

    public function save(UserSignupDTO $user): bool
    {
        $this->Database->query(
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

        return true;
    }

    public function change(UserModel $user): bool
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
