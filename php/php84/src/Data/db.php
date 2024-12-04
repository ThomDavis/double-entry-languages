<?php

namespace App\Data;

use PDO;
use PDOException;

global $pdo;

header("Content-Type: application/json");
try {
    $pdo = new PDO('sqlite:src/Data/php84.db');
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
