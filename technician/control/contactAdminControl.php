<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit;
}

require __DIR__ . '../../model/db.php';

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conn = $mydb->openCon();

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['errors'] = [];

    $subject = test_input($_POST['subject']);
    $message = test_input($_POST['message']);

    $result = $mydb->getUserInfo($conn, $technician_id);
    $email = $result['email'] ?? '';

    if (empty($subject)) {
        $_SESSION['errors'][] = "Subject is required.";
    }

    if (empty($message)) {
        $_SESSION['errors'][] = "Message is required.";
    }

    if (strlen($message) > 100) {
        $_SESSION['errors'][] = "Message cannot exceed 100 characters.";
    }

    if (empty($_SESSION['errors'])) {
        if ($mydb->insertContactAdminMessage($email, $subject, $message, $conn)) {
            $_SESSION['successMessage'] = "Message sent successfully.";
            header("Location: ../view/functions/contactAdmin.php");
            exit;
        } else {
            $_SESSION['errors'][] = "Failed to send the message. Please try again.";
        }
    }
}

$mydb->closeCon($conn);
?>
