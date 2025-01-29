<?php
require '../../model/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$appointments = $mydb->viewAppointmentHistory($technician_id, $conObj);
?>
