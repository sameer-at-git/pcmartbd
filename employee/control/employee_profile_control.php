<?php
session_start();
$id = $_SESSION['emp_id'];
include "../model/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $ephone = trim($_POST["phone"]);
    $dob = $_POST["dob"];
    $address = trim($_POST["pre_add"]);
    $paddress = trim($_POST["per_add"]);
    $epass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $hasError = [];

    $uploadphoto = "../view/images/employee/";
    $photoPath = "images/employee/";


    if (strlen($fname) > 15) {
        $hasError[] = "Firstname can not be more than 15 characters";
    }
    if (strlen($lname) > 10) {
        $hasError[] = "Last name can not be more than 10 characters";
    }


    if (!preg_match("/^0\d{10}$/", $ephone)) {
        $hasError[] = "Phone number must start with 0 and have 11 numbers";
    }


    if (empty($dob)) {
        $hasError[] = "Enter Date Of Birth";
    }


    if (empty($address)) {
        $hasError[] = "Enter Present Address";
    }


    if (empty($paddress)) {
        $hasError[] = "Enter Permanent Address";
    }


    if (!empty($epass)) {

        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$/", $epass) && strlen($epass) < 6) {
            $hasError[] = "Invalid Password";
        }
    } else {
        $hasError[] = "Enter a Password";
    }

    if ($cpass !== $epass) {
        $hasError[] = "Password and Confirm Password do not match";
    }



    if (!empty($hasError)) {
        echo "<h2>Please correct the following hasError:</h2>";
        echo "<ul>";
        foreach ($hasError as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        $mydb = new myDB();
        $conObj = $mydb->openCon();
        $result = $mydb->updateEmployee(
            $id,
            $fname,
            $lname,
            $ephone,
            $dob,
            $address,
            $paddress,
            $epass,
            $conObj
        );
        if ($result) {
            header("Location:../view/layout/profile.php");
        } else {
            echo "Error";
        }
    }
}
