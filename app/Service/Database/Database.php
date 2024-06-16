<?php

namespace App\Service\Database;

use PDO;
use PDOException;

class Database extends PDO implements DatabaseInterface
{
    public function __construct(
        public string $Host,
        public string $DatabaseName,
        public string $Username,
        public string $Password
    ) {
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
}
