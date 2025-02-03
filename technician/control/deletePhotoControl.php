<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit;
}

require __DIR__ . "../../model/db.php";

$errors = [];

$mydb = new myDB();
$conObj = $mydb->openCon();
$technician_id = $_SESSION['technician_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['delete_photo'])) {
        $defaultPhotoPath = "../uploads/default_photo.jpg";

        $result = $mydb->updatePhotoPath($conObj, $technician_id, $defaultPhotoPath);
        
        if ($result) {
            $_SESSION['successMessage'] = "Photo deleted successfully.";
        } else {
            $_SESSION['errors'] = ["Failed to delete photo. Please try again."];
        }
        
        header("Location: ../view/functions/updateProfile.php");
        exit;
    }
}
$myDB->closecon($conObj);