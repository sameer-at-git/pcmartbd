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
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/broadcast.php" >Broadcast</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="reviews.php" class="active" >Reviews</a></td>

                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="appointments-container">
        <h2>Reviews Management</h2>
        
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
                            <td><?php echo $row['customer_id']; ?></td>
                            <td><?php echo $row['technician_id']; ?></td>
                            <td><?php echo $row['review']; ?></td>
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
                            <td><?php echo $row['technician_id']; ?></td>
                            <td><?php echo $row['customer_id']; ?></td>
                            <td><?php echo $row['review']; ?></td>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['reviewed_entity']; ?></td>
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