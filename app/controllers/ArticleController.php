<?php

require_once __DIR__ . '/../models/Article.php';
require_once __DIR__ . '/../models/Category.php';

class ArticleController {
    
    public function show($id) {
        $article = Article::find($id);
        
        if (!$article) {
            header('HTTP/1.0 404 Not Found');
            return [
                'template' => '404.tpl',
                'data' => ['message' => 'Статья не найдена']
            ];
        }
        
        $categoryIds = array_column($article['categories'], 'id');
        $related = Article::getRelated($id, $categoryIds, 3);
        
        return [
            'template' => 'article.tpl',
            'data' => [
                'article' => $article,
                'related' => $related
            ]
        ];
    }
}