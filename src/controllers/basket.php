<?php

class Basket
{
    public function index()
{
    $basket = $_SESSION['basket'] ?? []; // Retrieve basket items from session
    $products = [];

    // Fetch product details for each item in the basket
    foreach ($basket as $productId => $details) {
        $product = Product::getById($productId);
        if ($product) {
            // Add quantity to product details
            $product['quantity'] = $details['quantity'] ?? 0;
            $products[] = $product; 
        }
    }
    require 'views/basket_index.php';
}


    private function getProductsByIds($ids)
{
    if (!is_array($ids)) { //Debugging
        $ids = [$ids];
    }
    $productDetails = [];

    foreach ($ids as $productId => $quantity) {
        $product = Product::getById($productId);
        if ($product) {
            $productDetails[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'quantity' => $quantity,
            ];
        }
    }

    return $productDetails;
}


}
