<?php

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Article.php';

class HomeController {
    
    public function index() {
        $categories = Category::allWithArticles();
        
        $latestArticles = [];
        foreach ($categories as $category) {
            $latestArticles[$category['id']] = Article::latestByCategory($category['id'], 3);
        }
        
        return [
            'template' => 'index.tpl',
            'data' => [
                'categories' => $categories,
                'latestArticles' => $latestArticles
            ]
        ];
    }
}