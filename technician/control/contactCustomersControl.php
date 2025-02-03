<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit;
}

require __DIR__ . "../../model/db.php";

$mydb = new myDB();
$conn = $mydb->openCon();
$technician_id = $_SESSION['technician_id'];
$appointments = $mydb->viewAllAppointments($conn, $technician_id);

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendMessage'])) {
    $appointment_id = isset($_POST['appointment_id']) ? sanitizeInput($_POST['appointment_id']) : null;
    $message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : null;
    $sender = "technician";

    if (empty($message)) {
        $_SESSION['errors'][] = "Message cannot be empty.";
    } elseif (strlen($message) > 100) {
        $_SESSION['errors'][] = "Message cannot exceed 100 characters.";
    }
    if (empty($_SESSION['errors'])) {
        if ($mydb->updateMessage($conn, $appointment_id, $sender, $message)) {
            $_SESSION['successMessage'] = "Message sent successfully.";
        } else {
            $_SESSION['errors'][] = "Failed to send message.";
        }
    }
    header('Location: ../functions/contactCustomers.php');
    exit;
}

$mydb->closeCon($conn);
