<?php

namespace App\Service\Database;

use PDO;
use PDOException;
use PDOStatement;

interface DatabaseInterface
{
    public function connect(): PDO;
    public static function connection(): array;
    public function query(string $sql, ?array $params = null): PDOStatement|PDOException;
}
