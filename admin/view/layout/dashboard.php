<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/dashboardstyle.css">
    <link rel="stylesheet" href="../../css/index.css">
    <script src="../../js/dashboard.js"></script>
</head>
<body class="db">
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="home.php" class="website-name"><p>PCMartBD</p></a>
    </div>
    <div class="admin-info">
        <a href="profile.php" class="admin-link">
            <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
            <div class="admin-name"><?php echo $userInfo['name']; ?></div>
        </a>
    </div>
</div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="dashboard.php" class="active">Dashboard</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="update_profile.php">Account</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="sidebar">
            <ul class="sidebar-nav">
                <li><button onclick="showSection('employee_performance', event)">Employee Performance</button></li>
                <li><button onclick="showSection('technician_performance', event)">Technician Performance</button></li>
                <li><button onclick="showSection('customer_overview', event)" >Customer Overview</button></li>
                <li><button onclick="showSection('overall_revenue', event)">Overall Revenue</button></li>
                <li><button onclick="showSection('product_performance', event)">Product Performance</button></li>
                <li><button onclick="showSection('ratings_review', event)">Ratings & Reviews</button></li>
            </ul>
        </div>
        
        <div class="content">
            <div id="customer_overview" class="content-section">
                <h2>Customer Overview</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Customers</h3>
                        <p><?php echo $db->getTotalCustomers($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Active Subscriptions</h3>
                        <p><?php echo $db->getActiveSubscriptions($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Customer Satisfaction</h3>
                        <p><?php echo $db->getCustomerSatisfactionRating($conn); ?>/5</p>
                    </div>
                </div>
            </div>

            <div id="employee_performance" class="content-section ">
                <h2>Employee Performance</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Employees</h3>
                        <p><?php echo $db->getTotalEmployees($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Average Performance</h3>
                        <p><?php echo $db->getAverageEmployeePerformance($conn); ?>%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Top Performers</h3>
                        <p><?php echo $db->getTopPerformersCount($conn); ?></p>
                    </div>
                </div>
            </div>

            <div id="technician_performance" class="content-section">
                <h2>Technician Performance</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Technicians</h3>
                        <p><?php echo $db->getTotalTechnicians($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Average Rating</h3>
                        <p><?php echo $db->getTechnicianAverageRating($conn); ?>/5</p>
                    </div>
                    <div class="stat-box">
                        <h3>Jobs Completed</h3>
                        <p><?php echo $db->getTotalCompletedJobs($conn); ?></p>
                    </div>
                </div>
            </div>

            <div id="overall_revenue" class="content-section">
                <h2>Overall Revenue</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Revenue</h3>
                        <p>৳<?php echo $db->getTotalRevenue($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Monthly Growth</h3>
                        <p><?php echo $db->getMonthlyGrowthRate($conn); ?>%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Average Order Value</h3>
                        <p>৳<?php echo $db->getAverageOrderValue($conn); ?></p>
                    </div>
                </div>
            </div>

            <div id="product_performance" class="content-section">
                <h2>Product Performance</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Products</h3>
                        <p><?php echo $db->getTotalProducts($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Top Selling</h3>
                        <p><?php echo $db->getTopSellingProductCount($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Low Stock</h3>
                        <p><?php echo $db->getLowStockProductCount($conn); ?></p>
                    </div>
                </div>
            </div>

            <div id="ratings_review" class="content-section">
                <h2>Ratings & Reviews</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>Total Reviews</h3>
                        <p><?php echo $db->getTotalReviews($conn); ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Average Rating</h3>
                        <p><?php echo $db->getAverageProductRating($conn); ?>/5</p>
                    </div>
                    <div class="stat-box">
                        <h3>Recent Reviews</h3>
                        <p><?php echo $db->getRecentReviewsCount($conn); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fd">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
    
</body>
</html>