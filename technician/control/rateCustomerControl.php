<?php
require __DIR__ . '../../model/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$customers = $mydb->getCustomersByTechnician($conObj, $technician_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_rating'])) {
    $appointment_id = $_POST['submit_rating'];
    $rating = $_POST['rating'][$appointment_id] ?? "";
    $comment = $_POST['comment'][$appointment_id] ?? "";

    if (is_null($rating) || $rating < 1 || $rating > 5) {
        $_SESSION['errors'][] = "Invalid rating. Please provide a rating between 1 and 5.";
    }

    if (strlen($comment) > 100) {
        $_SESSION['errors'][] = "Comment too long. Maximum 100 characters allowed.";
    }

    if (empty($_SESSION['errors'])) {
        if ($mydb->updateCustomerRating($conObj, $appointment_id, $rating, $comment)) {
            $_SESSION['successMessage'] = "Rating and comment updated successfully.";
        } else {
            $_SESSION['errors'][] = "Error updating rating.";
        }
    }

    header("Location: ../view/functions/rateCustomers.php");
    exit;
}
