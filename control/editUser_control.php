<?php

session_start();
//echo "$_GET["id"]";


if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

include '../model/db.php';

$mydb = new myDB();
$connection = $mydb->openCon();

$email = $_SESSION['user_email'];

$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    $adminData = $result->fetch_assoc();
    $adminProfileHTML = "<h2>Admin Profile</h2>";
    $adminProfileHTML .= "<p>Name: " . $adminData['name'] . "</p>";
    $adminProfileHTML .= "<p>Email: " . $adminData['email'] . "</p>";
    $adminProfileHTML .= "<p>Phone: " . $adminData['number'] . "</p>";
    if (!empty($adminData['propic'])) {
        $adminProfileHTML .= "<img src='" . $adminData['propic'] . "' alt='Profile Picture' width='100'>";
    }
} else {
    $adminProfileHTML = "<p>No data found.</p>";
}

$mydb->closecon($connection);
?>


