<?php
require '../model/db.php';

// Ensure the technician is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get technician ID from session
$technician_id = $_SESSION['user_id'];
echo $technician_id;

// Instantiate the database object
$mydb = new myDB();
$conObj = $mydb->openCon();
$appointments = $mydb->viewAppointments($technician_id, $conObj);
?>
