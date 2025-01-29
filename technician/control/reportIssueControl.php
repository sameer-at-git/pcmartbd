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
    $subject = $_POST['subject'];
    $priority = $_POST['priority'];
    $message = $_POST['message'];
    
    if ($mydb->insertReport($technician_id, $subject, $priority, $message, $conn)) {
        echo "<div class='success-message'>Message sent successfully!</div>";
        header("Location: ../view/functions/reportIssue.php");
        exit;
    } else {
        echo "<div class='error-message'>Error sending message. Please try again.</div>";
    }
    
    $mydb->closeCon($conn);
}
?>