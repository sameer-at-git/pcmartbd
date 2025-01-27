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
    <title>Technician Home - PCMartBD</title>
    <link rel="stylesheet" href="../../css/homestyle.css">
</head>

<body>

    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">PC<span>MartBD</span></a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href=#>Notifications</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href=#>Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Quick Actions</h2>
            <div class="quick-actions">
                <div class="action-card">
                    <h3><img src="../../images/icons/calendar-check-solid.svg" alt="Add Icon" class="icon"></i>Appointments</h3>
                    <div class="action-links">
                        <a href="../functions/viewAppointment.php">
                            <img src="../../images/icons/list-solid.svg" alt="Add Icon" class="icon">
                            <span>View Appointments</span>
                        </a>
                        <a href="../functions/appointmentHistory.php">
                            <img src="../../images/icons/clock-rotate-left-solid.svg" alt="Add Icon" class="icon">
                            <span>Appointment History</span>
                        </a>
                        <a href="../functions/scheduleManagement.php">
                            <img src="../../images/icons/clock-solid.svg" alt="Add Icon" class="icon">
                            <span>Change Appointment Schedule</span>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/users-solid.svg" alt="Add Icon" class="icon"></i>Customer Interaction</h3>
                    <div class="action-links">
                        <a href="../functions/liveChat.php">
                            <img src="../../images/icons/comments-solid.svg" alt="Add Icon" class="icon">
                            <span>Live Chat</span>
                        </a>
                        <a href="../functions/rateCustomers.php">
                            <img src="../../images/icons/star-solid.svg" alt="Add Icon" class="icon">
                            <span>Rate Customers</span>
                        </a>
                        <a href="../functions/customerFeedback.php">
                            <img src="../../images/icons/comment-dots-solid.svg" alt="Add Icon" class="icon">
                            <span>View Feedback</span>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/headset-solid.svg" alt="Add Icon" class="icon"></i>Support</h3>
                    <div class="action-links">
                        <a href="../functions/contactAdmin.php">
                            <img src="../../images/icons/key-solid.svg" alt="Add Icon" class="icon">
                            <span>Contact Admin</span>
                        </a>
                        <a href="../functions/reportIssue.php">
                            <img src="../../images/icons/flag-solid.svg" alt="Add Icon" class="icon">
                            <span>Report Issue</span>
                        </a>
                        <a href="../functions/helpCenter.php">
                            <img src="../../images/icons/circle-question-solid.svg" alt="Add Icon" class="icon">
                            <span>Help Center</span>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <h3><img src="../../images/icons/user-gear-solid.svg" alt="Add Icon" class="icon">My Account</h3>
                    <div class="action-links">
                        <a href="../functions/updateProfile.php">
                            <img src="../../images/icons/user-pen-solid.svg" alt="Add Icon" class="icon">
                            <span>Update Profile</span>
                        </a>
                        <a href="../functions/changePassword.php">
                            <img src="../../images/icons/key-solid.svg" alt="Add Icon" class="icon">
                            <span>Change Password</span>
                        </a>
                        <a href="../functions/notifications.php">
                            <img src="../../images/icons/bell-solid.svg" alt="Add Icon" class="icon">
                            <span>Notifications</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>