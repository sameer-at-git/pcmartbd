<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/home.css">
    <script src="../../js/dashboard.js" defer></script>
</head>

<body>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="dashboard.php" class="active">Dashboard</a></td>
                    <td><a href="notifications.php">Notifications</a></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="sidebar">
            <ul class="sidebar-nav">
                <li><a href="../dashboards/employee_performance.php" class="sidebar-link">Employee Performance</a></li>
                <li><a href="../dashboards/technician_performance.php" class="sidebar-link">Technician Performance</a></li>
                <li><a href="../dashboards/customer_overview.php" class="sidebar-link">Customer Overview</a></li>
                <li><a href="../dashboards/overall_revenue.php" class="sidebar-link">Overall Revenue</a></li>
                <li><a href="../dashboards/product_performance.php" class="sidebar-link">Product Performance</a></li>
                <li><a href="../dashboards/ratings_review.php" class="sidebar-link">Ratings & Reviews</a></li>
            </ul>
        </div>
        <div class="content">
        </div>
    </div>
</body>

</html>