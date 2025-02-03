<?php 
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);

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

    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/layout.css"></head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
        <div class="admin-info">
        <a href="profile.php" class="admin-link">
            <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
            <div class="admin-name"><?php echo $userInfo['name']; ?></div>
        </a>
    </div>
    </div>

    <div class="navbar">
        <table>
        <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="messages.php" class="active">Messages</a></td>
                    <td><a href="broadcast.php" >Broadcast</a></td>
                    <td><a href="contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>

                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
        </table>
    </div>

    <div class="messages-container">
        <div class="filters">
            <button class="filter-btn active-btn" onclick="showAllMessages()">All Messages</button>
            <button class="filter-btn" onclick="showMessagesByType('Admin')">Admin</button>
            <button class="filter-btn" onclick="showMessagesByType('Customer')">Customer</button>
            <button class="filter-btn" onclick="showMessagesByType('Employee')">Employee</button>
            <button class="filter-btn" onclick="showMessagesByType('Technician')">Technician</button>
            <button class="filter-btn" onclick="showMessagesByType('Guest')">Guest</button>
        </div>

        <div id="messages-list" class="messages-list">
            <?php foreach ($messageArray as $message) { ?>
                <div class="message">
    <div class="message__type"><?php echo $message['user_type']; ?></div>
    <div class="message__content-wrapper">
        <div class="message__info">
            <div class="message__subject"><?php echo $message['subject']; ?></div>
            <div class="message__email"><?php echo $message['email']; ?></div>
            <div class="message__content"><?php echo $message['message']; ?></div>
        </div>
        <div class="message__actions">
    <?php if ($message['user_type'] == "Admin") { ?>
        <h3 >!Broadcast!</h3>
    <?php } else { ?>
        <a href="contact_user.php" class="reply-btn">Reply User</a>
    <?php } ?>
</div>
    </div>
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