<?php
include '../model/db.php';

$db = new UserDB();
$conn = $db->openCon();
$products_per_page = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $products_per_page;
$products = $db->fetch_products_with_pagination($conn, $products_per_page, $offset);
$db->closeCon($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Browse</title>
    <link rel="stylesheet" href="../css/browse.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" class="main-logo" alt="Logo">
            <a href="home.php" class="website-name">PCMartBD</a>
        </div>
        <div class="signup">
            <a href="../../customer/view/sign_up.php" class="signup-link">Create Account</a>
        </div>
    </div>

    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php" class="active">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php" >Contact Admin</a></td>
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

        <div class="box-container">
            <?php foreach ($products as $product): ?>
                <div class="box">
                    <div class="inner-box">
                        <img src="../../employee/view/<?= $product['photo'] ?>" alt="Product Image" class="boximg">
                        <h3><?= $product['brand'] ?> - <?= $product['type'] ?></h3>
                        <p>Price: $<?= $product['price'] ?></p>
                        <p><?= $product['about'] ?></p>
                        <button type="submit" onclick="addToCart(<?= $product['pid'] ?>)">Add To Cart</button>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="page-link">Previous</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <a href="?page=<?= $i ?>" class="page-link <?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
            <?php if ($page < 5): ?>
                <a href="?page=<?= $page + 1 ?>" class="page-link">Next</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>

    <script src="../js/browse.js"></script>
</body>

</html>