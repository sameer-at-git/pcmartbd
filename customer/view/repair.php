<?php
session_start();

if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Repair Services-PCMartBD</title>
    <link rel="stylesheet" href="../css/repair.css">
</head>
<body>
<div class="header">
    <div class="logo-container">
        <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="browse.php" id="website-name"><p>PCMartBD</p></a>
    </div>
</div>

<div class="navbar">
    <ul>
        <li><a href="browse.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="repair.php">Repair</a></li>
        <li><a href="../control/sessionout.php">Logout</a></li>
    </ul>
</div>


    <div class="about-container">
        <div class="about-header">
            <h1>Hardware Repair Services</h1>
            <p class="tagline">Professional repair services for all your hardware needs</p>
        </div>

        <div class="contact-section">
            <h2>Schedule Your Repair</h2>
            <p class="repair-description">Click below to schedule an appointment with our expert technicians</p>
            <a href="createapp.php" class="repair-button">
                Create Appointment
            </a>
        </div>
    </div>
    <div class="footer">
    <p>&copy; 2024 PCMartBD. All rights reserved.</p>
</div>

</body>
</html>
