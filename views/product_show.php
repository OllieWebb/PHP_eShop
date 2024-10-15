<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
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

    <section class="product-details">
        <div class="image-placeholder" style="background-color: lightgray; padding: 20px; text-align: center; margin-bottom: 20px; border-radius: 5px;">
            <p style="margin: 0; font-weight: bold;">Add Image Later</p>
        </div>
        <h2><?= htmlspecialchars($product['name']); ?></h2>
        <p><?= htmlspecialchars($product['description']); ?></p>
        <form action="index.php?page=add_to_basket" method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
        <button type="submit" class="button">Add to Basket</button>
</form>
    </section>

    <section class="reviews-section">
        <h3>Reviews:</h3>
        <div class="reviews">
            <?php if (count($reviews) > 0): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review">
                        <p class="review-author"><?= htmlspecialchars($review['author']); ?> - <small><?= htmlspecialchars($review['created_at']); ?></small></p>
                        <p><?= htmlspecialchars($review['content']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews yet.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="add-review">
        <h3>Add a Review</h3>
        <form action="index.php?page=submit_review" method="POST">
    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
    <input type="text" name="author" placeholder="Your Name" required>
    <textarea name="content" placeholder="Write your review..." required></textarea>
    <button type="submit">Submit Review</button>
</form>
        
    </section>

</div>

<footer>
    <p>&copy; 2024 My eCommerce Project</p>
</footer>

</body>
</html>
