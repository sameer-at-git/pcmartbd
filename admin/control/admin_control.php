<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}
include('../model/db.php');
$db = new myDB();
$conn = $db->openCon();
function validateAdminInput($data) {
    $errors = array();
    if (empty($data['name']) || strlen($data['name']) < 4) {
        $errors[] = "Name must be at least 4 characters long";
    }
    if (empty($data['number']) || strlen($data['number']) < 11 || !is_numeric($data['number'])) {
        $errors[] = "Enter a valid phone number";
    }
    if (empty($data['access'])) {
        $errors[] = "Access level is required";
    }
    return $errors;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $errors = validateAdminInput($_POST);
        if (empty($errors)) {
            if ($db->updateProfile(
                $_POST['admin_id'],
                $_POST['name'],
                $_POST['number'],
                $_POST['bio'],
                $_POST['presentaddress'],
                $_POST['permanentaddress'],
                $_POST['password'],
                $_POST['access'],
                $_POST['email'],
                $conn
            )) {
                echo "Admin updated successfully!";
            } else {
                echo "Error updating admin";
            }
        } else {
            foreach($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    if (isset($_POST['delete'])) {
        if ($db->deleteAdmin($conn, $_POST['email'])) {
            echo "Admin deleted successfully!";
        } else {
            echo "Error deleting admin";
        }
    }
}
$db->closecon($conn);
?>