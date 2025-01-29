<?php
require __DIR__ . '../../model/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
// Fetch customers using the database function
$customers = $mydb->getCustomersByTechnician($conObj,$technician_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_rating'])) {
    $appointment_id = $_POST['submit_rating'];
    $rating = $_POST['rating'][$appointment_id] ?? "";
    $comment = $_POST['comment'][$appointment_id] ?? "";

    // Validate input
    if (is_null($rating) || $rating < 1 || $rating > 5) {
        die("Invalid rating. Please provide a rating between 1 and 5.");
    }

    if (strlen($comment) > 300) {
        die("Comment too long. Maximum 300 characters allowed.");
    }
    if ($mydb->updateCustomerRating($conObj, $appointment_id, $rating, $comment)) {
        // Redirect back to the view after successful update
        header("Location: ../view/functions/rateCustomers.php");
        exit;
    } else {
        // Handle error
        echo "Error updating rating.";
    }
}
