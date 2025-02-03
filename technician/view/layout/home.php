<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/view/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Home - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body>

    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Quick Actions</h2>
            <div class="quick-actions">
                <div class="action-card">
                    <h3><img src="../../images/icons/calendar-check-solid.svg" alt="Add Icon" class="icon"></i>Appointments</h3>
                    <div class="action-links">
                        <a href="../functions/viewAvailableAppointments.php">
                            <img src="../../images/icons/clock-solid.svg" alt="Add Icon" class="icon">
                            <p>Available Appointments</p>
                        </a>
                        <a href="../functions/viewActionRequiredAppointments.php">
                            <img src="../../images/icons/circle-exclamation-solid.svg" alt="Add Icon" class="icon">
                            <p>Action Required Appointments</p>
                        </a>
                        <a href="../functions/viewAllAppointment.php">
                            <img src="../../images/icons/list-solid.svg" alt="Add Icon" class="icon">
                            <p>View All Appointments</p>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/users-solid.svg" alt="Add Icon" class="icon"></i>Customer Interaction</h3>
                    <div class="action-links">
                        <a href="../functions/contactCustomers.php">
                            <img src="../../images/icons/comments-solid.svg" alt="Add Icon" class="icon">
                            <p>Contact Customers</p>
                        </a>
                        <a href="../functions/rateCustomers.php">
                            <img src="../../images/icons/star-solid.svg" alt="Add Icon" class="icon">
                            <p>Rate Customers</p>
                        </a>
                        <a href="../functions/viewCustomerFeedback.php">
                            <img src="../../images/icons/comment-dots-solid.svg" alt="Add Icon" class="icon">
                            <p>View Customer Feedback</p>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/headset-solid.svg" alt="Add Icon" class="icon"></i>Support</h3>
                    <div class="action-links">
                        <a href="../functions/contactAdmin.php">
                            <img src="../../images/icons/key-solid.svg" alt="Add Icon" class="icon">
                            <p>Contact Admin</p>
                        </a>
                        <a href="../functions/reportIssue.php">
                            <img src="../../images/icons/flag-solid.svg" alt="Add Icon" class="icon">
                            <p>Report Issue</p>
                        </a>
                        <a href="../functions/faqPage.php">
                            <img src="../../images/icons/circle-question-solid.svg" alt="Add Icon" class="icon">
                            <p>Frequently Asked Questions</p>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/user-gear-solid.svg" alt="Add Icon" class="icon">My Account</h3>
                    <div class="action-links">
                        <a href="../functions/updateProfile.php">
                            <img src="../../images/icons/user-pen-solid.svg" alt="Add Icon" class="icon">
                            <p>Update Profile</p>
                        </a>
                        <a href="../functions/changePassword.php">
                            <img src="../../images/icons/key-solid.svg" alt="Add Icon" class="icon">
                            <p>Change Password</p>
                        </a>
                        <a href="profile.php">
                            <img src="../../images/icons/user-solid.svg" alt="Add Icon" class="icon">
                            <p>View Profile</p>
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