<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
    $db = new myDB();
    $conn = $db->openCon();
    $filter = $_POST['filter'];
    $messages = $db->getAllMessages($conn, $filter);
    $db->closeCon($conn);

    if ($messages): 
        foreach ($messages as $message): ?>
            <div class='message-card'>
                <div class='message-header'>
                    <div class='sender-type'><?php echo $message['sentby']; ?></div>
                    <div class='message-date'><?php echo $message['sent_date']; ?></div>
                </div>
                <h3 class='message-subject'><?php echo $message['subject']; ?></h3>
                <p class='message-sender'>From: <?php echo $message['sender_email']; ?></p>
                <div class='message-content'><?php echo $message['message']; ?></div>
            </div>
        <?php endforeach; 
    else: ?>
        <p>No messages found for the selected filter.</p>
    <?php endif; 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Notifications</title>
    <link rel="stylesheet" href="../../css/home.css">
    <script src="../../js/notifications.js" defer></script>
</head>
<body>
<div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
    </div>
    <div class="navbar">
        <table>
            <tr>
                <td><a href="home.php">Home</a></td>
                <td><a href="dashboard.php">Dashboard</a></td>
                <td><a href="notifications.php" class="active">Notifications</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
    </div>
    <div class="notifications-container">
        <h1>All Messages</h1>
        <div class="filters">
            <button class="filter-btn active-btn" id="all" onclick="fetchMessages('all')">All Messages</button>
            <button class="filter-btn" id="admin" onclick="fetchMessages('admin')">Admin Messages</button>
            <button class="filter-btn" id="customer" onclick="fetchMessages('customer')">Customer Messages</button>
            <button class="filter-btn" id="employee" onclick="fetchMessages('employee')">Employee Messages</button>
            <button class="filter-btn" id="technician" onclick="fetchMessages('technician')">Technician Messages</button>
            <button class="filter-btn" id="guest" onclick="fetchMessages('Guest')">Guest Messages</button>
        </div>
        <div id="messages-container"></div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
