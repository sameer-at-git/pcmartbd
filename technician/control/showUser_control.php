<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

include '../model/db.php';

$mydb = new myDB();
$connection = $mydb->openCon();

$email = $_SESSION['user_email'];

$sql = "SELECT * FROM technician WHERE email = '$email'";
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    $technicianData = $result->fetch_assoc();
    $technicianProfileHTML = "<h2>Technician Profile</h2>";
    $technicianProfileHTML .= "<p>Name: " . $technicianData['first_name'] . "</p>";
    $technicianProfileHTML .= "<p>Email: " . $technicianData['email'] . "</p>";
    $technicianProfileHTML .= "<p>Phone: " . $technicianData['phone'] . "</p>";
    $technicianProfileHTML .= "<p>Technician ID: " . $technicianData['technician_id'] . "</p>";
    if (!empty($atechnicianData['photo'])) {
        $technicianProfileHTML .= "<img src='" . $technicianData['photo'] . "' alt='Profile Picture' width='100'>";
    }
} else {
    $technicianProfileHTML = "<p>No data found.</p>";
}

$mydb->closecon($connection);
?>
