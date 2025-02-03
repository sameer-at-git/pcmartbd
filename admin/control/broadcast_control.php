<?php
session_start();
include('../model/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    if (empty($subject) || empty($message)) {
        $_SESSION['broadcast_message'] = "Please fill in all fields.";
        header('Location: ../view/layout/broadcast.php');
        exit();
    }
    $db = new myDB();
    $conn = $db->openCon();
    $aid = $_SESSION['admin_id'];
    $userInfo = $db->getUserInfo($conn, $aid);
    $email = $userInfo['email'];
    if ($db->insertMessage($email, $subject, $message, $conn)) {
        $_SESSION['broadcast_message'] = "Message sent successfully!";
    } else {
        $_SESSION['broadcast_message'] = "Failed to send message. Please try again.";
    }
    $db->closeCon($conn);
    header('Location: ../view/layout/broadcast.php');
} else {
    header('Location: ../view/layout/broadcast.php');
}
?>