<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<header>
    <h2>eShop</h2>
    <nav>
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=products">Products</a></li>
            <li><a href="index.php?page=basket">Basket</a></li>
        </ul>
    </nav>
</header>

<section class="page-title">
    <h1>Our Products</h1>
</section>

<div class="container">
    <div class="product-list">
        <?php foreach($products as $product): ?>
        <div class="product">
            <h2><?= htmlspecialchars($product['name']); ?></h2>
            <p><?= htmlspecialchars($product['description']); ?></p>
            <a href="index.php?page=product&id=<?= $product['id']; ?>" class="button">View Product</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 My eCommerce Project</p>
</footer>

</body>
</html>
