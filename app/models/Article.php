<?php

require_once __DIR__ . '/../../config/db.php';

class Article {
    
    public static function latestByCategory($categoryId, $limit = 3) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT a.* FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
            ORDER BY a.created_at DESC
            LIMIT " . (int)$limit
        );
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function paginateByCategory($categoryId, $order, $limit, $offset) {
        $db = DB::connect();
        
        $orderSql = $order === 'views' ? 'views DESC' : 'created_at DESC';
        $limit = (int)$limit;
        $offset = (int)$offset;
        
        $stmt = $db->prepare("
            SELECT a.* FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
            ORDER BY $orderSql
            LIMIT $limit OFFSET $offset
        ");
        
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function countByCategory($categoryId) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT COUNT(*) as total FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id = ?
        ");
        $stmt->execute([$categoryId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
    public static function find($id) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($article) {
            self::incrementViews($id);
            $article['categories'] = self::getCategories($id);
        }
        
        return $article;
    }
    
    public static function getRelated($articleId, $categoryIds, $limit = 3) {
        if (empty($categoryIds)) {
            return [];
        }
        
        $db = DB::connect();
        $placeholders = str_repeat('?,', count($categoryIds) - 1) . '?';
        
        $stmt = $db->prepare("
            SELECT DISTINCT a.* FROM articles a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id IN ($placeholders)
            AND a.id != ?
            ORDER BY a.created_at DESC
            LIMIT " . (int)$limit
        );
        
        $params = array_merge($categoryIds, [$articleId]);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getCategories($articleId) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT c.* FROM categories c
            JOIN article_category ac ON c.id = ac.category_id
            WHERE ac.article_id = ?
        ");
        $stmt->execute([$articleId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private static function incrementViews($id) {
        $db = DB::connect();
        $stmt = $db->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
}