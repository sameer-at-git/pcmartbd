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
    <title>Frequently Asked Questions - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">PCMartBD</a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a class="active" href="../layout/home.php">Home</a></li>
            <li><a href="../layout/dashboard.php">Dashboard</a></li>
            <li><a href="../layout/settings.php">Settings</a></li>
            <li><a href="../layout/profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <div class="page-header">
                <a href="../layout/home.php" class="back-button">
                    Back to Home
                </a>
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="help-container">
                <div class="faq-section">

                    <div class="faq-item">
                        <h4>How do I update my availability?</h4>
                        <p>Go to Settings > Edit Profile Information to update your working hours and service areas.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I view my appointments?</h4>
                        <p>Check your Dashboard or go to Appointments section to view all upcoming and past appointments.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I report an issue with a customer?</h4>
                        <p>Use the Report Issue page to submit any concerns about appointments or customers.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I contact administration?</h4>
                        <p>Use the Contact Admin page for direct communication with administrators.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I update my profile information?</h4>
                        <p>Go to Settings > Edit Profile or Home > Update Profile to update your personal information and credentials.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I rate customers?</h4>
                        <p>After completing an appointment, use the Rate Customers page to provide feedback.</p>
                    </div>

                    <div class="faq-item">
                        <h4>How do I check my reviews?</h4>
                        <p>Check the View Customer Feedback page to check your reviews and customer feedback.</p>
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