<?php

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../app/models/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../app/views/templates/');
$smarty->setCompileDir(__DIR__ . '/../cache/');
$smarty->setCacheDir(__DIR__ . '/../cache/');

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = parse_url($requestUri, PHP_URL_PATH);

if ($requestUri === '/' || $requestUri === '/index.php') {
    $controller = new HomeController();
    $result = $controller->index();

    foreach ($result['data'] as $key => $value) {
        $smarty->assign($key, $value);
    }
    $smarty->assign('template', $result['template']);
    $smarty->display('layout.tpl');
} elseif (preg_match('#^/category/(\d+)$#', $requestUri, $matches)) {
    $controller = new CategoryController();
    $result = $controller->show($matches[1]);

    foreach ($result['data'] as $key => $value) {
        $smarty->assign($key, $value);
    }
    $smarty->assign('template', $result['template']);
    $smarty->display('layout.tpl');
} elseif (preg_match('#^/article/(\d+)$#', $requestUri, $matches)) {
    $controller = new ArticleController();
    $result = $controller->show($matches[1]);

    foreach ($result['data'] as $key => $value) {
        $smarty->assign($key, $value);
    }
    $smarty->assign('template', $result['template']);
    $smarty->display('layout.tpl');
} else {
    header('HTTP/1.0 404 Not Found');
    $smarty->assign('template', '404.tpl');
    $smarty->assign('message', 'Страница не найдена');
    $smarty->display('layout.tpl');
}
