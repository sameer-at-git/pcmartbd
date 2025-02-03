<?php
session_start();
if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../layout/view/login.php');
    exit();
}

include '../model/db.php';
$db = new myDB2();
$conn = $db->openCon();

// Get product data and total pages

$products = getProducts($conn);
$total_pages = getTotalPages($conn);

$db->closeCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Browse</title>
    <link rel="stylesheet" href="../css/browse.css">
    <script src="search.js"></script>
</head>
<body>

<div class="header">
    <div class="logo-container">
        <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="browse.php" id="website-name"><p>PCMartBD</p></a>
    </div>
</div>

<div class="navbar">
    <ul>
        <li><a href="browse.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="repair.php">Repair</a></li>
        <li><a href="../control/sessionout.php">Logout</a></li>
    </ul>

    <!-- Search bar inside the navbar -->
    <form id="searchForm" class="search-form">
        <input type="text" id="searchInput" name="search" placeholder="Search products..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Search</button>
    </form>
</div>

<div class="browse-container">
    <div id="productContainer" class="box-container">
        <?php if (empty($products)): ?>
            <p>No products found.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="box">
                    <img src="../../employee/<?= $product['photo'] ?>" alt="Product Image">
                    <h3><?= $product['brand'] ?> - <?= $product['type'] ?></h3>
                    <p>Quality: <?= $product['quantity']?></p>
                    <p>Status: <?= $product['status'] ?></p>
                    <p><?= $product['about'] ?></p>
                    <p>Price: $<?= $product['price'] ?></p>
                    <form action="payment.php" method="GET">
                        <input type="hidden" name="pid" value="<?= $product['pid'] ?>">
                        <button type="submit">Add To Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="page-link <?= $i == ($_GET['page'] ?? 1) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 PCMartBD. All rights reserved.</p>
</div>

</body>
</html>
