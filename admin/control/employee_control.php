<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}
include('../model/db.php');
$db = new myDB();
$conn = $db->openCon();
function validateEmployeeInput($data) {
    $errors = array();
    if (empty($data['f_name']) || strlen($data['f_name']) < 2) {
        $errors[] = "First name must be at least 2 characters long";
    }
    if (empty($data['l_name'])) {
        $errors[] = "Last name is required";
    }
    if (empty($data['phone']) || !preg_match("/^01\d{9}$/", $data['phone'])) {
        $errors[] = "Enter valid 11-digit phone number starting with 01";
    }
    if (empty($data['gender'])) {
        $errors[] = "Gender selection is required";
    }
    if (empty($data['dob'])) {
        $errors[] = "Date of Birth is required";
    } else {
        $dobDate = new DateTime($data['dob']);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
        if ($age < 18) {
            $errors[] = "Employee must be at least 18 years old";
        }
    }
    if (empty($data['pre_add']) || strlen($data['pre_add']) < 10) {
        $errors[] = "Present address must be at least 10 characters long";
    }
    if (empty($data['employment'])) {
        $errors[] = "Employment type is required";
    }
    return $errors;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $errors = validateEmployeeInput($_POST);
        if (empty($errors)) {
            if ($db->updateEmployee($conn,$_POST['f_name'],$_POST['l_name'],$_POST['phone'],$_POST['email'],$_POST['dob'],$_POST['pre_add'],$_POST['gender'],$_POST['employment'])) {
                echo "Employee updated successfully!";
            } else {
                echo "Error updating employee";
            }
        } else {
            foreach($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    if (isset($_POST['delete'])) {
        if ($db->deleteEmployee($conn, $_POST['email'])) {
            echo "Employee deleted successfully!";
        } else {
            echo "Error deleting employee";
        }
    }
}
$db->closecon($conn);
?>