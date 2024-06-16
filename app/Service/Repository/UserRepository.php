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
        try {
            $stmt = $this->Connection->prepare('SELECT * FROM user WHERE id = :id');
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
            $stmt = $this->Connection->query('SELECT * FROM user');
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
            $connection = $this->Connection;
            $connection->beginTransaction();
            $sql = "INSERT INTO user (email, name,  passwordHash) VALUES (:email, :name, :passwordHash)";
            $statement = $connection->prepare($sql);
            $statement->bindValue('email', $user->Email, PDO::PARAM_STR);
            $statement->bindValue('name', $user->Name, PDO::PARAM_STR);
            $statement->bindValue('passwordHash', password_hash($user->Password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $statement->execute();
            $connection->commit();

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
            $stmt = $this->Connection->prepare('UPDATE user SET email = :email, name = :name, passwordHash = :passwordHash WHERE id = :id');
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
            $stmt = $this->Connection->prepare('DELETE FROM user WHERE id = :id');
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $exception) {
            die("Unable to remove user" . $exception->getMessage());
        } finally {
            $stmt = null;
        }
    }
}
