<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Dashboard - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Quick Statistics</h2>
            <div class="stats-wrapper">
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>All Appointments</h3>
                        <p>0</p>
                    </div>
                    <div class="stat-box">
                        <h3>Pending Appointments</h3>
                        <p>0</p>
                    </div>
                    <div class="stat-box">
                        <h3>Completed Appointments</h3>
                        <p>0</p>
                    </div>
                    <div class="stat-box">
                        <h3>Total Reviews</h3>
                        <p>0</p>
                    </div>
                </div>
                </section>

                <section>
                    <h2>Recent Activities</h2>
                    <div class="activities">
                        <p>No recent activities to display.</p>
                    </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>