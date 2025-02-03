<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require '../../model/db.php';

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$userInfo = $mydb->getUserInfo($conObj, $technician_id);
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
            <li><a class="active" href="profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
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
                            <p><?php echo $userInfo['first_name']?></p>
                        </div>
                        <div class="info-group">
                            <label>Last Name:</label>
                            <p><?php echo $userInfo['last_name']?></p>
                        </div>
                        <div class="info-group">
                            <label>Father's Name:</label>
                            <p><?php echo $userInfo['father_name']?></p>
                        </div>
                        <div class="info-group">
                            <label>Gender:</label>
                            <p><?php echo $userInfo['gender']?></p>
                        </div>
                        <div class="info-group">
                            <label>Date of Birth:</label>
                            <p><?php echo $userInfo['dob']?></p>
                        </div>
                        <div class="info-group">
                            <label>Phone:</label>
                            <p><?php echo $userInfo['phone']?></p>
                        </div>
                        <div class="info-group">
                            <label>Address:</label>
                            <p><?php echo $userInfo['address']?></p>
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
                            <p><?php echo $userInfo['experience']?></p>
                        </div>
                        <div class="info-group">
                            <label>Preferred Work Area:</label>
                            <p><?php echo $userInfo['work_area']?></p>
                        </div>
                        <div class="info-group">
                            <label>Work Hours:</label>
                            <p><?php echo $userInfo['work_hour']?></p>
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
                            <p><?php echo $userInfo['email']?></p>
                        </div>
                        <div class="info-group">
                            <label>Member Since:</label>
                            <p><?php echo $userInfo['join_date']?></p>
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
