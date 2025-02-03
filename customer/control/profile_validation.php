<?php
session_start();
if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../layout/view/login.php');
    exit();
}

include '../model/db.php';
$db = new myDB2();
$conn = $db->openCon();
$customer_id = $_SESSION['customer_id'];


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);

    $errors = [];

    // Validate Name
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    // Validate Email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Validate Phone
    if (empty($phone)) {
        $errors['phone'] = "Phone is required.";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
        $errors['phone'] = "Invalid phone number. It must be 11 digits.";
    }

    // Validate Address
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }

    // Validate Password (if provided)
    if (!empty($password)) {
        if (strlen($password) < 8) {
            $errors['password'] = "Password must be at least 8 characters long.";
        } 
    }
    $userId=$_SESSION['user_id'];
    if (empty($errors)){
        if($db->profileUpdateInfo($conn,$name,$email,$phone,$address,$password,$customer_id,$userId)){
            header("Location: ../view/profile.php");
            exit();
        }

    } else {
        foreach($errors as $hasError){
            echo $hasError." <br>";
        }
    }
}

$db->closeCon($conn);
?>
