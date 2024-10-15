<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
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

<div class="container">
    <h2>Your Basket</h2>
    <?php if (empty($products)): ?>
        <p>Your basket is empty.</p>
    <?php else: ?>
        <table class="basket-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']); ?></td>
                        <td><?= htmlspecialchars($product['description']); ?></td>
                        <td><?= htmlspecialchars($product['quantity']); ?></td>
                        <td>
                            <form class="action-form" action="index.php?page=remove_from_basket" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="index.php?page=checkout" method="GET">
            <button type="submit" class="checkout-button">Proceed to Checkout</button>
        </form>
    <?php endif; ?>
</div>

<footer>
    <p>&copy; 2024 My eCommerce Project</p>
</footer>

</body>
</html>
