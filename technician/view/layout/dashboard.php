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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header>
    <div class="logo-container">
        <i class="fas fa-laptop-medical"></i>
        <a href="home.php" class="website-name">PC<span>MartBD</span></a>
    </div>
</header>

    <nav>
        <ul>
        <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href=#>Notifications</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href=#>Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Quick Statistics</h2>
            <div class="stats-container">
                <div class="stat-box">
                    <h3>Today's Appointments</h3>
                    <p>0</p>
                </div>
                <div class="stat-box">
                    <h3>Pending Requests</h3>
                    <p>0</p>
                </div>
                <div class="stat-box">
                    <h3>Completed Services</h3>
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
        </section>
    </main>

    <footer>
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </footer>
</body>
</html>
