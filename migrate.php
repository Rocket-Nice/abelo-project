<?php

require_once __DIR__ . '/config/db.php';

try {
    $host = getenv('DB_HOST') ?: 'db';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: 'root';

    $pdo = new PDO(
        "mysql:host=$host;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $pdo->exec("CREATE DATABASE IF NOT EXISTS blog");
    echo "✅ База данных blog создана\n";

    $db = DB::connect();

    $db->exec("
        CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Таблица categories создана\n";

    $db->exec("
        CREATE TABLE IF NOT EXISTS articles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            image VARCHAR(255),
            title VARCHAR(255) NOT NULL,
            description TEXT,
            content LONGTEXT,
            views INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Таблица articles создана\n";

    $db->exec("
        CREATE TABLE IF NOT EXISTS article_category (
            article_id INT,
            category_id INT,
            PRIMARY KEY (article_id, category_id),
            FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
        )
    ");
    echo "✅ Таблица article_category создана\n";

    echo "\n🎉 Все таблицы созданы!\n";
} catch (PDOException $e) {
    echo "❌ Ошибка: " . $e->getMessage() . "\n";
}
