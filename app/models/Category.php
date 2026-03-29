<?php

require_once __DIR__ . '/../../config/db.php';

class Category {
    
    public static function allWithArticles() {
        $db = DB::connect();
        $stmt = $db->query("
            SELECT DISTINCT c.* 
            FROM categories c
            INNER JOIN article_category ac ON c.id = ac.category_id
            ORDER BY c.name
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function find($id) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function getArticleCount($categoryId) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT COUNT(*) as total 
            FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
        ");
        $stmt->execute([$categoryId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}