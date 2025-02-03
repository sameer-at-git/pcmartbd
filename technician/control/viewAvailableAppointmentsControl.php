<?php
require __DIR__.'../../model/db.php';


session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit();
}

$mydb = new myDB();
$conObj = $mydb->openCon();
$technician_id = $_SESSION['technician_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id']; 

    if ($mydb->markAppointmentInProgress($appointment_id, $technician_id, $conObj)) {
        $_SESSION['successMessage'] = "You've taken this appointment so it's now marked as 'In Progress'.";
    } else {
        $_SESSION['errorMessage'] = "Failed to take this appointment.";
    }

    header("Location: ../view/functions/viewAvailableAppointments.php");
    exit();
}

$appointments = $mydb->viewAvailableAppointments($conObj);
?>
