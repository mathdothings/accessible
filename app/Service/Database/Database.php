<?php

namespace App\Service\Database;

use PDO;
use PDOException;

class Database extends PDO implements DatabaseInterface
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
}
