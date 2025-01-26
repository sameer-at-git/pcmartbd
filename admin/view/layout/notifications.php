<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$messages = $db->getAllMessages($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Notifications</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
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
            <button class="filter-btn active" data-filter="all">All Messages</button>
            <button class="filter-btn" data-filter="customer">Customer Messages</button>
            <button class="filter-btn" data-filter="employee">Employee Messages</button>
            <button class="filter-btn" data-filter="technician">Technician Messages</button>
        </div>

        <div class="messages-list">
            <?php if ($messages && $messages->num_rows > 0): ?>
                <?php while ($message = $messages->fetch_assoc()): ?>
                    <div class="message-card <?php echo $message['sender_type']; ?>">
                        <div class="message-header">
                            <span class="sender-type"><?php echo ucfirst($message['sender_type']); ?></span>
                            <span class="message-date"><?php echo date('M d, Y H:i', strtotime($message['sent_date'])); ?></span>
                        </div>
                        <h3 class="message-subject"><?php echo htmlspecialchars($message['subject']); ?></h3>
                        <p class="sender-email">From: <?php echo htmlspecialchars($message['sender_email']); ?></p>
                        <div class="message-content">
                            <?php echo nl2br(htmlspecialchars($message['message'])); ?>
                        </div>
                        <div class="message-actions">
                            <button class="reply-btn" onclick="replyToMessage('<?php echo $message['sender_email']; ?>')">Reply</button>
                            <button class="delete-btn" onclick="deleteMessage(<?php echo $message['message_id']; ?>)">Delete</button>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-messages">No messages found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="../js/notifications.js"></script>
</body>
</html>