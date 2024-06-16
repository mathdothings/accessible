<?php

namespace App\Service\Repository;

use PDO;
use PDOException;
use App\Service\Database\Database;
use App\Model\UserModel;
use App\DTO\UserSignupDTO;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(public Database $Database)
    {
        $this->Database = $Database->connect();
    }

    public function findById(int $id): UserModel
    {
        try {
            $stmt = $this->Database->prepare('SELECT * FROM user WHERE id = :id');
            $stmt->execute(['id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return new UserModel($data['id'], $data['email'], $data['name'], $data['passwordHash']);
        } catch (PDOException $exception) {
            die("Unable to find an user with this Id" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function findAll(): array
    {
        try {
            $stmt = $this->Database->query('SELECT * FROM user');
            $users = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new UserModel($data['id'], $data['email'], $data['name'], $data['passwordHash']);
            }

            return $users;
        } catch (PDOException $exception) {
            die("No user found" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function save(UserSignupDTO $user): bool
    {
        try {
            $stmt = $this->Database->prepare('INSERT INTO user (email, name, passwordHash) VALUES (:email, :name, :passwordHash)');
            $stmt->execute([
                'email' => $user->Email,
                'email' => $user->Name,
                'passwordHash' => password_hash($user->Password, PASSWORD_DEFAULT)
            ]);
            dd('Sucess!');
            return true;
        } catch (PDOException $exception) {
            die("Unable to save user" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function change(UserModel $user): bool
    {
        try {
            $stmt = $this->Database->prepare('UPDATE user SET email = :email, name = :name, passwordHash = :passwordHash WHERE id = :id');
            $stmt->execute([
                'id' => $user->Id,
                'username' => $user->Email,
                'email' => $user->Name,
                'passwordHash' => $user->PasswordHash
            ]);

            return true;
        } catch (PDOException $exception) {
            die("Unable to change user" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }

    public function remove($id): bool
    {
        try {
            $stmt = $this->Database->prepare('DELETE FROM user WHERE id = :id');
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $exception) {
            die("Unable to remove user" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }
}
