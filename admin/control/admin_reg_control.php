<?php
session_start();
include ('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();
    
    // Name validation
    $uname = trim($_POST['uname'] ?? '');
    if (empty($uname)) {
        $hasError[] = "Name cannot be empty";
    }

    // Email validation
    $email = trim($_POST['email'] ?? '');
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError[] = "Valid email is required";
    }

    // Password validation
    $pass = trim($_POST['pass'] ?? '');
    if (empty($pass) || strlen($pass) < 6) {
        $hasError[] = "Password must be at least 6 characters";
    }

    // Access level validation
    $access = trim($_POST['permit'] ?? '');
    if (empty($access) || $access === "0") {
        $hasError[] = "Please select access level";
    }

    // Phone number validation - Updated
    $number = trim($_POST['phone'] ?? ''); // Changed from 'number' to 'phone' to match form
    if (empty($number) || strlen($number) !== 11 || !str_starts_with($number, '01')) {
        $hasError[] = "Phone number must be 11 digits and start with '01'";
    }

    // Gender validation
    $gender = $_POST['gender'] ?? '';
    if (empty($gender)) {
        $hasError[] = "Please select gender";
    }

    // Other fields
    $bio = trim($_POST['bio'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $doj = trim($_POST['doj'] ?? '');
    $preadd = trim($_POST['preadd'] ?? '');
    $peradd = trim($_POST['peradd'] ?? '');
    
    // File handling
    $nidFile = $_FILES['nid'] ?? null;
    $picFile = $_FILES['pic'] ?? null; // Changed from 'propic' to 'pic' to match form

    if (empty($hasError)) {
        $mydb = new myDB();
        $conObj = $mydb->openCon();

        $nidPath = "../uploads/nid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION);
        $picPath = "../uploads/pic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION);
        
        move_uploaded_file($nidFile["tmp_name"], $nidPath);
        move_uploaded_file($picFile["tmp_name"], $picPath);

        $result = $mydb->insertData(
            $uname, $email, $pass, $access, $number, 
            $gender, $bio, $dob, $doj, $preadd, 
            $peradd, $nidPath, $picPath, 'admin', $conObj
        );

        if ($result) {
            $_SESSION['success_message'] = "Admin registered successfully!";
            header("Location: ../../layout/login.php");
            exit();
        }
        
        $mydb->closecon($conObj);
    }
}
?>
