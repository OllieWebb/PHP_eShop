<?php
session_start(); //To manage Basket

require 'src/controllers/products.php';
require 'src/controllers/basket.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'product':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductsController();
            $controller->show($id);
        } else {
            echo "Product ID is missing.";
        }
        break;

    case 'products':
        $controller = new ProductsController();
        $controller->index();
        break;

    case 'submit_review': 
        $controller = new ProductsController();
        $controller->submitReview();
        break;

    case 'add_to_basket':
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            // Check if the product is already in the basket
            if (isset($_SESSION['basket'][$product_id])) {
                $_SESSION['basket'][$product_id]['quantity'] += 1; // Increment the quantity if product exists
            } else {
                // Add the product with quantity 1 if not in the basket
                $_SESSION['basket'][$product_id] = ['quantity' => 1];
            }

            header("Location: index.php?page=basket");
            exit; // Stop further execution after redirection
        } else {
            echo "Product ID is missing.";
        }
        break;

    case 'remove_from_basket':
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            if (isset($_SESSION['basket'][$product_id])) {
                unset($_SESSION['basket'][$product_id]); // REMOVE
            }

            header("Location: index.php?page=basket");  //Redirect
            exit;
        } else {
            echo "Product ID is missing.";
        }
        break;

    case 'basket':
        $controller = new Basket();
        $controller->index();
        break;

    default:
        require 'views/home_index.php';
        break;
}

