<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
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
    <title>Employee Performance - Admin Dashboard</title>
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
                <li><a href="employee_performance.php" class="sidebar-link active">Employee Performance</a></li>
                <li><a href="technician_performance.php" class="sidebar-link">Technician Performance</a></li>
                <li><a href="customer_overview.php" class="sidebar-link">Customer Overview</a></li>
                <li><a href="overall_revenue.php" class="sidebar-link">Overall Revenue</a></li>
                <li><a href="product_performance.php" class="sidebar-link">Product Performance</a></li>
                <li><a href="ratings_review.php" class="sidebar-link">Ratings & Reviews</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content-section">
                <h2>Employee Performance Overview</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Employees</h3>
                        <p>24</p>
                    </div>
                    <div class="stat-box">
                        <h3>Average Performance</h3>
                        <p>87%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Top Performer</h3>
                        <p>John D.</p>
                    </div>
                </div>
                
                <!-- Add more employee-specific content here -->
                <div class="dashboard-section">
                    <h3>Performance Metrics</h3>
                    <!-- Add your metrics content -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
