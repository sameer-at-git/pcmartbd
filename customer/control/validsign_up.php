<?php
session_start();
include ('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();

    // Get POST data and trim any extra spaces
    $name = trim($_POST['name'] ?? '');
    $phone = $_POST['phone'];
    $address = trim($_POST['address'] ?? '');
    $email = trim($_POST['email'] ?? ''); // Corrected variable from $phone to $email
    $pass = trim($_POST['password'] ?? '');
    $conpass = trim($_POST['conpassword'] ?? '');

    // Name validation
    if (empty($name)) {
        $hasError[] = "Name cannot be empty.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $hasError[] = "Name can only contain letters and spaces.";
    }

    // Address validation
    if (empty($address)) {
        $hasError[] = "Address cannot be empty.";
    }

    // Email validation
    if (empty($email)) {
        $hasError[] = "Email cannot be empty.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError[] = "Invalid email format.";
    }

    // Phone number validation (assuming it's a required field and validating number format)
    if (empty($phone)) {
        $hasError[] = "Phone number cannot be empty.";
    } elseif (!preg_match("/^\d{11}$/", $phone)) {
        $hasError[] = "Phone number must be exactly 11 digits.";
    }

    // Password and Confirm Password validation
    if (empty($pass)) {
        $hasError[] = "Password cannot be empty.";
    } elseif (strlen($pass) < 8) {
        $hasError[] = "Password must be at least 8 characters long.";
    }

    if (empty($conpass)) {
        $hasError[] = "Confirm password cannot be empty.";
    } elseif ($pass !== $conpass) {
        $hasError[] = "Passwords do not match.";
    }

    // If no errors, process the data and insert into the database
    if (empty($hasError)) {

        // Use a secure method to interact with the database, such as prepared statements
        $mydb = new myDB2();
        $conObj = $mydb->openCon();
        
        // Prepare the SQL query using placeholders to prevent SQL injection
        if ($mydb->signupInfo($conObj,$name,$email,$phone,$address,$pass,"Customer")) {
            header("Location: ../../layout/view/login.php");
            exit();
        } else {
            echo "Sign Up Error";
        }

        $conObj->close();
    } else {
        // Display errors if there are any
        foreach ($hasError as $error) {
            echo $error . "<br>";
        }
    }
}
?>
