<?php

// для опенсервера
// class DB {
//     public static function connect() {
//         return new PDO(
//             "mysql:host=localhost;dbname=blog;charset=utf8",
//             "root",
//             "",
//             [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//         );
//     }
// }

// докер

class DB
{
    public static function connect()
    {
        $host = getenv('DB_HOST') ?: 'db';
        $dbname = getenv('DB_NAME') ?: 'blog';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: 'root';

        try {
            return new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,
                $pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
