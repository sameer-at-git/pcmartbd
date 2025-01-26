<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Browse Products - PCMartBD</title>
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php" class="active">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </table>
        </div>
</div>

    <div class="browse-container">
        <div class="search-filter-section">
            <div class="search-bar">
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Search products...">
                    <button type="submit">Search</button>
                </form>
            </div>
            
            <div class="filter-options">
                <div class="filter-group">
                    <h3>Categories</h3>
                    <form action="" method="GET">
                        <label><input type="checkbox" name="category[]" value="cpu"> Processors (CPU)</label>
                        <label><input type="checkbox" name="category[]" value="gpu"> Graphics Cards</label>
                        <label><input type="checkbox" name="category[]" value="motherboard"> Motherboards</label>
                        <label><input type="checkbox" name="category[]" value="ram"> RAM</label>
                        <label><input type="checkbox" name="category[]" value="storage"> Storage</label>
                        <label><input type="checkbox" name="category[]" value="psu"> Power Supply</label>
                        <label><input type="checkbox" name="category[]" value="case"> Cases</label>
                    </form>
                </div>

                <div class="filter-group">
                    <h3>Price Range</h3>
                    <form action="" method="GET">
                        <input type="number" name="min_price" placeholder="Min Price">
                        <input type="number" name="max_price" placeholder="Max Price">
                        <button type="submit">Apply</button>
                    </form>
                </div>

                <div class="filter-group">
                    <h3>Brand</h3>
                    <form action="" method="GET">
                        <label><input type="checkbox" name="brand[]" value="asus"> ASUS</label>
                        <label><input type="checkbox" name="brand[]" value="msi"> MSI</label>
                        <label><input type="checkbox" name="brand[]" value="gigabyte"> Gigabyte</label>
                        <label><input type="checkbox" name="brand[]" value="intel"> Intel</label>
                        <label><input type="checkbox" name="brand[]" value="amd"> AMD</label>
                    </form>
                </div>

                <div class="filter-group">
                    <h3>Sort By</h3>
                    <select name="sort">
                        <option value="popular">Most Popular</option>
                        <option value="newest">Newest First</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                        <option value="rating">Customer Rating</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="products-section">
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image">
                        </div>
                        <div class="product-details">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <div class="product-rating">
                                ★★★★☆ (<?= htmlspecialchars($product['reviews']) ?>)
                            </div>
                            <div class="product-price">$<?= htmlspecialchars($product['price']) ?></div>
                            <div class="product-stock"><?= $product['stock'] ? 'In Stock' : 'Out of Stock' ?></div>
                            <div class="product-actions">
                                <button class="favorite-btn" title="Add to Favorites">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#">Previous</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Next</a>
            </div>
        </div>
    </div>
</body>
</html>
