<?php
class Product {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";
            self::$pdo = new PDO($dsn, "product_db_user", "secret", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$pdo;
    }

    public static function getAll() {
        $stmt = self::connect()->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::connect()->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getReviews($productId) {
        $stmt = self::connect()->prepare("SELECT * FROM reviews WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function addReview($productId, $author, $content) {
    $stmt = self::connect()->prepare("INSERT INTO reviews (product_id, author, content) VALUES (:product_id, :author, :content)");
    $stmt->execute([
        'product_id' => $productId,
        'author' => $author,
        'content' => $content
    ]);
}
}