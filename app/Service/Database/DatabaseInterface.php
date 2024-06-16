<?php

namespace App\Service\Database;

use PDO;

interface DatabaseInterface
{
    public function connect(): PDO;
    static function connection(): array;
}
