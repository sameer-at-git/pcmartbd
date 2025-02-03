<?php
session_start();
include('../model/db.php');
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userType = $_POST['userType'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $userId = $_POST['userId'] ?? '';
    if (empty($userType) || empty($email) || empty($subject) || empty($message) || empty($userId)) {
        $_SESSION['message'] = "Please fill all the fields";
        header('Location: ../view/layout/contact_user.php');
        exit();
    }
    $db = new myDB();
    $conn = $db->openCon();
    $result = $db->insertContactUser($conn, $_SESSION['admin_id'], $userId, $subject, $message);
    $db->closeCon($conn);
    if (strpos($result, "successfully") !== false) {
        $_SESSION['message'] = "Message sent successfully!";
    } else {
        $_SESSION['message'] = "Error sending message";
    }
    header('Location: ../view/layout/contact_user.php');
    exit();
} else {
    header('Location: ../view/layout/contact_user.php');
    exit();
}
?>