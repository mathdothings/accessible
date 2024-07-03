<?php

namespace App\Service\Database;

use PDO;
use PDOException;
use PDOStatement;

class Database implements DatabaseInterface
{
    private string $Host;
    private string $DatabaseName;
    private string $Username;
    private string $Password;

    public function __construct(array $connection)
    {
        $this->Host = $connection['host'];
        $this->DatabaseName = $connection['databaseName'];
        $this->Username = $connection['username'];
        $this->Password = $connection['password'];
    }

    public function connect(): PDO
    {
        try {
            $dsn = "mysql:host={$this->Host};dbname={$this->DatabaseName};charset=utf8";
            $pdo = new PDO($dsn, $this->Username, $this->Password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
            return $pdo;
        } catch (PDOException $exception) {
            die("Database connection failed: " . $exception->getMessage());
        }
    }

    static function connection(): array
    {
        return [
            'host' => 'localhost',
            'databaseName' => 'oop-login-db',
            'username' => 'root',
            'password' => ''
        ];
    }

    public function query(string $sql, ?array $params = null): PDOStatement|PDOException
    {
        $pdo = $this->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $pdo->beginTransaction();
            $statement = $pdo->prepare($sql);

            if (!empty($params)) {
                foreach ($params as $param) {
                    ['key' => $key, 'value' => $value, 'type' => $type] = $param;
                    $statement->bindValue($key, $value, $type);
                }
            }

            $statement->execute();
            $pdo->commit();

            return $statement;
        } catch (PDOException $exception) {
            $pdo->rollBack();
            return $exception;
        } finally {
            $pdo = null;
        }
    }
}
