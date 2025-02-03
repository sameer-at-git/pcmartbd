<?php
require __DIR__.'../../model/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'], $_POST['action'])) {
    $appointment_id = intval($_POST['appointment_id']);
    $action = $_POST['action'];

    if ($action === 'Completed' || $action === 'Cancelled') {
        if ($mydb->updateAppointmentStatus($appointment_id, $action, $conObj)) {
            $_SESSION['successMessage'] = "Appointment marked as '{$action}'.";
        } else {
            $_SESSION['errorMessage'] = "Failed to update the appointment status.";
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid action.";
    }

    header("Location: ../view/functions/viewActionRequiredAppointments.php");
    exit();
}

$appointments = $mydb->viewActionRequiredAppointments($conObj, $technician_id);
?>
