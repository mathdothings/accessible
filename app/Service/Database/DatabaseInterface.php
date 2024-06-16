<?php

namespace App\Service\Database;

use PDO;

interface DatabaseInterface
{
    public function connect(): PDO;
}
