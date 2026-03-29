# Запуск проекта

## Требования
- Docker
- Docker Compose

## Команды

# Клонировать проект
git clone <repo-url>
cd abelo-project

# Запустить контейнеры
docker-compose up -d --build

# Установить зависимости PHP
docker exec -it blog_php composer install

# Создать таблицы
docker exec -it blog_php php migrate.php

# Заполнить данными
docker exec -it blog_php php seed.php

Доступ
Сайт: http://localhost:8080

phpMyAdmin: http://localhost:8081 (сервер: db, пользователь: root, пароль: root)

Остановка
docker-compose down

Пересборка с нуля
docker-compose down -v
docker-compose up -d --build
docker exec -it blog_php composer install
docker exec -it blog_php php migrate.php
docker exec -it blog_php php seed.php