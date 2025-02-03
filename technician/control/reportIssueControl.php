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
    $subject = test_input($_POST['subject']);
    $priority = test_input($_POST['priority']);
    $message = test_input($_POST['message']);

    $_SESSION['errors'] = [];

    if (empty($subject)) {
        $_SESSION['errors'][] = "Subject is required.";
    }

    if (empty($priority)) {
        $_SESSION['errors'][] = "Priority is required.";
    }

    if (empty($message)) {
        $_SESSION['errors'][] = "Message is required.";
    }

    if (strlen($message) > 100) {
        $_SESSION['errors'][] = "Message cannot exceed 100 characters.";
    }

    if (empty($_SESSION['errors'])) {
        if ($mydb->insertReport($technician_id, $subject, $priority, $message, $conn)) {
            $_SESSION['successMessage'] = "Issue reported successfully.";
            header("Location: ../view/functions/reportIssue.php");
            exit;
        } else {
            $_SESSION['errors'][] = "Failed to report the issue. Please try again.";
            header("Location: ../view/functions/reportIssue.php");
            exit;
        }
    }
}
$reports = $mydb->allTechnicianReports($conn, $technician_id);
$mydb->closeCon($conn);
