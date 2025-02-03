<?php
session_start();
include ('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();
    
    $uname = trim($_POST['uname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['pass'] ?? '');
    $access = trim($_POST['permit'] ?? '');
    $number = trim($_POST['phone'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $bio = trim($_POST['bio'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $doj = trim($_POST['doj'] ?? '');
    $preadd = trim($_POST['preadd'] ?? '');
    $peradd = trim($_POST['peradd'] ?? '');
    $nidFile = $_FILES['nid'] ?? null;
    $picFile = $_FILES['pic'] ?? null;

    if (empty($uname)) {
        $hasError[] = "Name cannot be empty";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError[] = "Valid email is required";
    }

    if (empty($pass) || strlen($pass) < 6) {
        $hasError[] = "Password must be at least 6 characters";
    }

    if (empty($access) || $access === "0") {
        $hasError[] = "Please select access level";
    }

    if (empty($number) || strlen($number) !== 11 || !str_starts_with($number, '01')) {
        $hasError[] = "Phone number must be 11 digits and start with '01'";
    }

    if (empty($gender)) {
        $hasError[] = "Please select gender";
    }

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
            $peradd, $nidPath, $picPath,  $conObj
        );

        if ($result) {
            
            header("Location: ../view/functions/manage_admin.php");
            exit();
        }
        
        $mydb->closecon($conObj);
    }
    else {
        foreach ($hasError as $error) {
            echo $error . "<br>";
        };
    }
}
?>
