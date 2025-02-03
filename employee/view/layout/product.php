<?php
session_start();
if (!isset($_SESSION['emp_id']) || !isset($_SESSION['user_id'])) {
header('Location: ../../../layout/view/login.php');
exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
?>

<html>

<head>
    <title>Product Information</title>
    <link rel="stylesheet" href="../../css/layout.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="full_home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="full_home.php">Home</a></td>
                    <td><a href="product.php" class="active">Products</a></td>
                    <td><a href="reviews.php">Reviews</a></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="content">
        <div class="content-section">
            <h2>Manage Products</h2>

            <div class="stats-container">
                <?php

                $product = $db->getTotalProducts($conn);
                $product_count = $product->fetch_assoc()['total_products'];


                $brand = $db->getTotalBrands($conn);
                $brand_count = $brand->fetch_assoc()['total_brands'];
                ?>
                <div class="stat-box">
                    <h4>Total Products</h4>
                    <p><?php echo $product_count; ?></p>
                </div>
                <div class="stat-box">
                    <h4>Total Brands</h4>
                    <p><?php echo $brand_count; ?></p>
                </div>
            </div>

            <div class="functionalities-grid">
                <div class="func-grid">
                    <h3><a href="../functions/add_product.php">Add Product</a></h3>
                    <h3><a href="../functions/show_product.php">Manage Products</a></h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>