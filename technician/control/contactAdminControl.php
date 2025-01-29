<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../model/db.php');
    $mydb = new myDB();
    $conn = $mydb->openCon();
    $technician_id = $_SESSION['technician_id'];
    $result = $mydb->getUserInfo($conn, $technician_id);
    $email = $result['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if ($mydb->insertMessage($email, $subject, $message, $conn)) {
        echo "<div class='success-message'>Message sent successfully!</div>";
        header("Location: ../view/functions/contactAdmin.php");
        exit;
    } else {
        echo "<div class='error-message'>Error sending message. Please try again.</div>";
    }
    
    $mydb->closeCon($conn);
}
?>