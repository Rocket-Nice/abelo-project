<?php

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Article.php';

class CategoryController {
    
    public function show($id) {
        $category = Category::find($id);
        
        if (!$category) {
            header('HTTP/1.0 404 Not Found');
            return [
                'template' => '404.tpl',
                'data' => ['message' => 'Категория не найдена']
            ];
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $order = isset($_GET['order']) && $_GET['order'] === 'views' ? 'views' : 'date';
        $perPage = 5;
        $offset = ($page - 1) * $perPage;
        
        $articles = Article::paginateByCategory($id, $order, $perPage, $offset);
        $totalArticles = Article::countByCategory($id);
        $totalPages = ceil($totalArticles / $perPage);
        
        return [
            'template' => 'category.tpl',
            'data' => [
                'category' => $category,
                'articles' => $articles,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'currentOrder' => $order,
                'totalArticles' => $totalArticles
            ]
        ];
    }
}