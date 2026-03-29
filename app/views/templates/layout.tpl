<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title|default:"Блог"} - Мой блог</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="/">Мой блог</a></h1>
            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="container">
        {include file=$template}
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 Мой блог. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>