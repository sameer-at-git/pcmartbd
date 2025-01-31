<?php
session_start();
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != 'Admin')) {
    header("Location: ../../view/layout/home.php");
    exit();
}
include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
$technician_reviews = $db->getTechnicianReviews($conn);
$customer_reviews = $db->getCustomerReviews($conn);
$product_reviews = $db->getProductReviews($conn);
$db->closeCon($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reviews</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="../layout/home.php" class="website-name"><p>PCMartBD</p></a>
    </div>
    <div class="admin-info">
        <a href="../layout/profile.php" class="admin-link">
            <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
            <div class="admin-name"><?php echo $userInfo['name']; ?></div>
        </a>
    </div>
</div>
    <div class="navbar">
        <div>
            <table>
            <tr>
                    <td><a href="../layout/home.php">Home</a></td>
                    <td><a href="../layout/dashboard.php" >Dashboard</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/update_profile.php">Account</a></td>
                    <td><a href="../layout/contact_admin.php" >Contact Admin</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="reviews.php" class="active" >Reviews</a></td>

                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">
    <h2>Customer Reviews on Technicians</h2>
    <div class="reviews-list" id="customer-reviews">
        <?php while ($row = $technician_reviews->fetch_assoc()) { ?>
            <div class="review-item">
                <p><?php echo $row['customer_id']; ?> (Customer)</p>
                <p>Technician: <?php echo $row['technician_id']; ?></p>
                <p><?php echo $row['review']; ?></p>
                <p>Rating: <?php echo $row['rating']; ?>/5</p>
            </div>
        <?php } ?>
    </div>
</div>

<div class="container">
    <h2>Technician Reviews on Customers</h2>
    <div class="reviews-list" id="technician-reviews">
        <?php while ($row = $customer_reviews->fetch_assoc()) { ?>
            <div class="review-item">
                <p><?php echo $row['technician_id']; ?> (Technician)</p>
                <p>Customer: <?php echo $row['customer_id']; ?></p>
                <p><?php echo $row['review']; ?></p>
                <p>Rating: <?php echo $row['rating']; ?>/5</p>
            </div>
        <?php } ?>
    </div>
</div>

    <div class="container">
        <h2>Product Reviews</h2>
        <div class="reviews-list" id="product-reviews">
            <?php while ($row = $product_reviews->fetch_assoc()) { ?>
                <div class="review-item">
                    <p><?php echo $row['name']; ?> (Customer)</p>
                    <p>Product: <?php echo $row['reviewed_entity']; ?></p>
                    <p><?php echo $row['review_text']; ?></p>
                    <p>Rating: <?php echo $row['rating']; ?>/5</p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>