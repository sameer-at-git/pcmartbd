<?php
session_start();
include('../model/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();
    $fname = trim($_POST['fname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $preadd = trim($_POST['preadd'] ?? '');
    $peradd = trim($_POST['peradd'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $status = trim($_POST['status'] ?? '');
    $nidFile = $_FILES['nidpic'] ?? null;
    $picFile = $_FILES['pic'] ?? null;
    $doj = trim($_POST['doj'] ?? '');
    $employment = trim($_POST['employment'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['pass'] ?? '');
    $conpass = trim($_POST['confirmpass'] ?? '');
    if (empty($fname) || empty($lname)) {
        $hasError[] = "Name cannot be empty";
    }
    if (empty($dob)) {
        $hasError[] = "Must Put Date of Birth";
    } else {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
        if ($age < 18) {
            $hasError[] = "Employee must be at least 18 years old";
        }
    }
    if (empty($doj)) {
        $hasError[] = "Must Put Date of Joining";
    }
    if (empty($preadd)) {
        $hasError[] = "Must Put Present Address";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError[] = "Valid email is required";
    }
    if (empty($pass) || strlen($pass) < 6) {
        $hasError[] = "Password must be at least 6 characters";
    }
    if (empty($status)) {
        $hasError[] = "Please select marital Status";
    }
    if (empty($employment)) {
        $hasError[] = "Please select An Employment Type";
    }
    if (empty($number) || strlen($number) !== 11 || !str_starts_with($number, '01')) {
        $hasError[] = "Phone number must be 11 digits and start with '01'";
    }
    if (empty($gender)) {
        $hasError[] = "Please select gender";
    }
    if ($pass !== $conpass) {
        $hasError[] = "Passwords Do Not Match";
    }
    if (empty($hasError)) {
        $mydb = new myDB();
        $conObj = $mydb->openCon();
        $enidPath = "../../uploads/empnid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION);
        $epicPath = "../../uploads/emppic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION);
        $nidPath = "../../employee/uploads/empnid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION);
        $picPath = "../../employee/uploads/emppic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION);
        move_uploaded_file($nidFile["tmp_name"], $nidPath);
        move_uploaded_file($picFile["tmp_name"], $picPath);
        $result = $mydb->insertEmployee($fname, $lname, $number, $dob, $preadd, $peradd, $gender, $status, $enidPath, $epicPath, $doj, $employment, $email, $pass, $conObj);
        if ($result) {
            header("Location: ../view/functions/manage_employee.php");
            exit();
        }
        $mydb->closecon($conObj);
    } else {
        foreach ($hasError as $error) {
            echo $error . "<br>";
        };
    }
}
?>