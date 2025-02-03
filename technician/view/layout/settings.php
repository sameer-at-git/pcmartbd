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
    <title>Settings - PCMartBD</title>
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
            <li><a class="active" href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Settings</h2>
            <div class="settings-container">
                <div class="settings-card">
                    <h3>
                        <img src="../../images/icons/user-gear-solid.svg" alt="Profile Icon" class="icon">
                        Profile Settings
                    </h3>
                    <div class="settings-links">
                        <a href="../functions/updateProfile.php">
                            <img src="../../images/icons/user-pen-solid.svg" alt="Edit Icon" class="icon">
                            Edit Profile Information
                        </a>
                    </div>
                </div>

                <div class="settings-card">
                    <h3>
                        <img src="../../images/icons/user-shield-solid.svg" alt="Security Icon" class="icon">
                        Account Security
                    </h3>
                    <div class="settings-links">
                        <a href="../functions/changePassword.php">
                            <img src="../../images/icons/key-solid.svg" alt="Password Icon" class="icon">
                            Change Password
                        </a>
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
