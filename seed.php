<?php

require_once __DIR__ . '/config/db.php';

$db = DB::connect();

$db->exec("SET FOREIGN_KEY_CHECKS = 0");
$db->exec("TRUNCATE TABLE article_category");
$db->exec("TRUNCATE TABLE articles");
$db->exec("TRUNCATE TABLE categories");
$db->exec("SET FOREIGN_KEY_CHECKS = 1");

$categories = [
    ['name' => 'Технологии', 'description' => 'Новости мира технологий, гаджеты, IT-тренды'],
    ['name' => 'Путешествия', 'description' => 'Лучшие места для путешествий, советы и лайфхаки'],
    ['name' => 'Кулинария', 'description' => 'Вкусные рецепты и кулинарные секреты'],
    ['name' => 'Спорт', 'description' => 'Новости спорта, тренировки, здоровый образ жизни'],
    ['name' => 'Искусство', 'description' => 'Живопись, музыка, кино и творчество'],
];

foreach ($categories as $cat) {
    $stmt = $db->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
    $stmt->execute([$cat['name'], $cat['description']]);
}

echo "✅ Категории добавлены\n";

$articles = [];

for ($i = 1; $i <= 15; $i++) {
    $articles[] = [
        'image' => '/uploads/photo.jpg',
        'title' => "Технологическая новость #{$i}",
        'description' => "Краткое описание технологической новости номер {$i}. Здесь рассказывается о новых гаджетах и IT-трендах.",
        'content' => "Полное содержание статьи номер {$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.",
        'views' => rand(100, 5000),
        'categories' => [1]
    ];
}

for ($i = 1; $i <= 12; $i++) {
    $articles[] = [
        'image' => '/uploads/photo.jpg',
        'title' => "Путешествие в место #{$i}",
        'description' => "Описание путешествия номер {$i}. Лучшие места, советы и лайфхаки для туристов.",
        'content' => "Полное содержание статьи о путешествии {$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        'views' => rand(100, 5000),
        'categories' => [2]
    ];
}

for ($i = 1; $i <= 10; $i++) {
    $articles[] = [
        'image' => '/uploads/photo.jpg',
        'title' => "Рецепт блюда #{$i}",
        'description' => "Вкусный и простой рецепт номер {$i}. Готовится быстро и из доступных продуктов.",
        'content' => "Полное описание рецепта {$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        'views' => rand(100, 5000),
        'categories' => [3]
    ];
}

for ($i = 1; $i <= 10; $i++) {
    $articles[] = [
        'image' => '/uploads/photo.jpg',
        'title' => "Спортивная новость #{$i}",
        'description' => "Новости спорта номер {$i}. Тренировки, здоровый образ жизни, советы.",
        'content' => "Полное содержание спортивной новости {$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        'views' => rand(100, 5000),
        'categories' => [4]
    ];
}

for ($i = 1; $i <= 8; $i++) {
    $articles[] = [
        'image' => '/uploads/photo.jpg',
        'title' => "Шедевр искусства #{$i}",
        'description' => "Обзор произведения искусства номер {$i}. Живопись, музыка, кино, творчество.",
        'content' => "Полный обзор произведения искусства {$i}. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        'views' => rand(100, 5000),
        'categories' => [5]
    ];
}

shuffle($articles);

foreach ($articles as $art) {
    $stmt = $db->prepare("
        INSERT INTO articles (image, title, description, content, views, created_at) 
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([$art['image'], $art['title'], $art['description'], $art['content'], $art['views']]);

    $articleId = $db->lastInsertId();

    foreach ($art['categories'] as $catId) {
        $stmt = $db->prepare("INSERT INTO article_category (article_id, category_id) VALUES (?, ?)");
        $stmt->execute([$articleId, $catId]);
    }
}

echo "✅ Добавлено статей: " . count($articles) . "\n";
echo "\n📊 Статистика по категориям:\n";
echo "Технологии: 15 статей\n";
echo "Путешествия: 12 статей\n";
echo "Кулинария: 10 статей\n";
echo "Спорт: 10 статей\n";
echo "Искусство: 8 статей\n";
echo "\n🎉 Сидинг завершен!\n";
