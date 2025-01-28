<?php 
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

$initialMessages = $db->getAllMessages($conn, null);
$messageArray = [];

if ($initialMessages && $initialMessages->num_rows > 0) {
    while ($message = $initialMessages->fetch_assoc()) {
        $messageArray[] = $message;
    }
}

$db->closeCon($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Messages - PCMartBD Admin</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>

    <div class="navbar">
        <table>
            <tr>
                <td><a href="home.php">Home</a></td>
                <td><a href="dashboard.php">Dashboard</a></td>
                <td><a href="messages.php" class="active">Messages</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
    </div>

    <div class="messages-container">
        <h1>Messages</h1>
        <div class="filters">
            <button class="filter-btn active-btn" onclick="showAllMessages()">All Messages</button>
            <button class="filter-btn" onclick="showMessagesByType('Admin')">Admin</button>
            <button class="filter-btn" onclick="showMessagesByType('Customer')">Customer</button>
            <button class="filter-btn" onclick="showMessagesByType('Employee')">Employee</button>
            <button class="filter-btn" onclick="showMessagesByType('Technician')">Technician</button>
            <button class="filter-btn" onclick="showMessagesByType('Guest')">Guest</button>
        </div>

        <div id="messages-list">
            <?php foreach ($messageArray as $message) { ?>
                <div>
                    <p><?php echo $message['message']; ?></p>
                    <p><?php echo $message['type']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
    <script src="../../js/messages.js"></script>
</body>
</html>