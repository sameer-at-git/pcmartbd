<?php
session_start();
if (!isset($_SESSION['emp_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/view/login.php');
    exit();
}

include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$eid= $_SESSION['emp_id'];
$technician_reviews = $db->getTechnicianReviews($conn);
$customer_reviews = $db->getCustomerReviews($conn);
$product_reviews = $db->getProductReviews($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reviews</title>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
<div class="header">
    <div class="logo-container">
        <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="../layout/home.php" class="website-name"><p>PCMartBD</p></a>
    </div>
</div>
    <div class="navbar">
        <div>
            <table>
                    <tr>
                        <td><a href="home.php">Home</a></td>
                        <td><a href="product.php">Products</a></td>
                        <td><a href="reviews.php" class="active">Reviews</a></td>
                        <td><a href="profile.php">Profile</a></td>
                        <td><a href="../../control/sessionout.php">Logout</a></td>
                    </tr>
            </table>
        </div>
    </div>

    <div class="appointments-container">
        <h2>Reviews of The Site</h2>
        
        <div class="reviews-section">
            <h3>Customer Reviews on Technicians</h3>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Technician</th>
                        <th>Review</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $technician_reviews->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['reviewer_id']; ?></td>
                            <td><?php echo $row['reviewed_id']; ?></td>
                            <td><?php echo $row['review_text']; ?></td>
                            <td><?php echo $row['rating']; ?>/5</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="reviews-section">
            <h3>Technician Reviews on Customers</h3>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Technician</th>
                        <th>Customer</th>
                        <th>Review</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $customer_reviews->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['reviewer_id']; ?></td>
                            <td><?php echo $row['reviewed_id']; ?></td>
                            <td><?php echo $row['review_text']; ?></td>
                            <td><?php echo $row['rating']; ?>/5</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="reviews-section">
            <h3>Product Reviews</h3>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Review</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $product_reviews->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['reviewer_id']; ?></td>
                            <td><?php echo $row['reviewed_id']; ?></td>
                            <td><?php echo $row['review_text']; ?></td>
                            <td><?php echo $row['rating']; ?>/5</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>