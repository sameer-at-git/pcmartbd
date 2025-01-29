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
   
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php" class="active">Repair</a></td>
                    <td><a href="../control/sessionout.php">LogOut</a></td>
                </tr>
            </table>
        </div>
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
</body>
</html>
