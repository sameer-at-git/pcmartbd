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
    <title>Profile - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">PCMartBD</a>
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
            <h2>Profile Information</h2>
            <div class="profile-container">
                <div class="profile-card">
                    <h3>
                        <img src="../../images/icons/user-solid.svg" alt="Personal Icon" class="icon">
                        Personal Details
                    </h3>
                    <div class="profile-info">
                        <div class="info-group">
                            <label>First Name:</label>
                            <p>John</p>
                        </div>
                        <div class="info-group">
                            <label>Last Name:</label>
                            <p>Doe</p>
                        </div>
                        <div class="info-group">
                            <label>Father's Name:</label>
                            <p>James Doe</p>
                        </div>
                        <div class="info-group">
                            <label>Gender:</label>
                            <p>Male</p>
                        </div>
                        <div class="info-group">
                            <label>Date of Birth:</label>
                            <p>1990-01-01</p>
                        </div>
                        <div class="info-group">
                            <label>Phone:</label>
                            <p>+880 1234567890</p>
                        </div>
                        <div class="info-group">
                            <label>Address:</label>
                            <p>123 Street, Dhaka, Bangladesh</p>
                        </div>
                    </div>
                </div>
                
                <div class="profile-card">
                    <h3>
                        <img src="../../images/icons/briefcase-solid.svg" alt="Work Icon" class="icon">
                        Work Details
                    </h3>
                    <div class="profile-info">
                        <div class="info-group">
                            <label>Experience:</label>
                            <p>5 years of experience in computer hardware repair and maintenance</p>
                        </div>
                        <div class="info-group">
                            <label>Preferred Work Area:</label>
                            <p>Mirpur, Uttora, Dhanmondi</p>
                        </div>
                        <div class="info-group">
                            <label>Work Hours:</label>
                            <p>Slot 1 - 7:00 AM to 12:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="profile-card">
                    <h3>
                        <img src="../../images/icons/id-card-regular.svg" alt="Account Icon" class="icon">
                        Account Details
                    </h3>
                    <div class="profile-info">
                        <div class="info-group">
                            <label>Email:</label>
                            <p>john.doe@example.com</p>
                        </div>
                        <div class="info-group">
                            <label>Member Since:</label>
                            <p>January 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
