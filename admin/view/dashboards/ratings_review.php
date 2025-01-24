<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header('Location: ../../../layout/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ratings & Reviews - Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/homestyle.css">
</head>
<body>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="../layout/home.php">Home</a></td>
                    <td><a href="../layout/dashboard.php" class="active">Dashboard</a></td>
                    <td><a href="../layout/notifications.php">Notifications</a></td>
                    <td><a href="../layout/profile.php">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="sidebar">
        <ul class="sidebar-nav">
                <li><a href="employee_performance.php" class="sidebar-link">Employee Performance</a></li>
                <li><a href="technician_performance.php" class="sidebar-link">Technician Performance</a></li>
                <li><a href="customer_overview.php" class="sidebar-link">Customer Overview</a></li>
                <li><a href="overall_revenue.php" class="sidebar-link">Overall Revenue</a></li>
                <li><a href="product_performance.php" class="sidebar-link">Product Performance</a></li>
                <li><a href="ratings_review.php" class="sidebar-link active">Ratings & Reviews</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content-section">
                <h2>Ratings & Reviews Overview</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Average Rating</h3>
                        <p>4.5/5</p>
                    </div>
                    <div class="stat-box">
                        <h3>Total Reviews</h3>
                        <p>1,234</p>
                    </div>
                    <div class="stat-box">
                        <h3>Recent Reviews</h3>
                        <p>48</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
