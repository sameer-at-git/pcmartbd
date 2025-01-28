<?php
require '../../model/db.php';

// Ensure the technician is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();

// Get the filtered appointments
$appointments = $mydb->viewAppointmentHistory($technician_id, $conObj);
?>
