<?php
require_once 'src/models/product.php';

class ProductsController {

    public function index() {
        $products = Product::getAll();
        require 'views/product_index.php';
    }

    public function show($id) {
        $product = Product::getById($id);

        $reviews = Product::getReviews($id);
        require 'views/product_show.php';
    }

    public function submitReview() {
    $productId = $_POST['product_id'] ?? null;
    $author = $_POST['author'] ?? null;
    $content = $_POST['content'] ?? null;

    // Sanitization
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $content = filter_var($content, FILTER_SANITIZE_STRING);

    // var_dump($productId, $author, $content); exit;  DEBUGGING

    Product::addReview($productId, $author, $content);

    header("Location: index.php?page=product&id=$productId"); //Redirect
    exit();
}

}