<?php
require '../../model/db.php';

// Ensure the technician is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get technician ID from session
$technician_id = $_SESSION['technician_id'];

// Get search/filter inputs from the form submission
$search = isset($_POST['search']) ? $_POST['search'] : null;
$filterColumn = isset($_POST['filterColumn']) ? $_POST['filterColumn'] : null;
$filterValue = isset($_POST['filterValue']) ? $_POST['filterValue'] : null;

// Instantiate the database object
$mydb = new myDB();
$conObj = $mydb->openCon();

// Get the filtered appointments
$appointments = $mydb->viewAppointments($technician_id, $conObj, $search, $filterColumn, $filterValue);
?>
