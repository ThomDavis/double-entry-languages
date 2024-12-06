<?php

namespace Php84\Data;


use PDO;
use PDOException;

class DB
{
    public static function pdo(): PDO
    {
        try {
            return new PDO('sqlite:src/Data/php84.db');
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}