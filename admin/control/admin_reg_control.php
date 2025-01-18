<?php
session_start();
require '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasError = [];
    $uname = trim($_POST["fullname"] ?? "");
    $fname = trim($_POST["fname"] ?? "");
    $gender = $_POST["gender"] ?? null;
    $number = trim($_POST["phone"] ?? "");
    $preadd = trim($_POST["preadd"] ?? "");
    $peradd = trim($_POST["peradd"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $doj = trim($_POST["doj"] ?? "");
    $bio = trim($_POST["bio"] ?? "");
    $access = trim($_POST["permit"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $pass = $_POST["pass"] ?? "";
    $conpass = $_POST["conpass"] ?? "";
    $nidFile = $_FILES["nid"] ?? null;
    $picFile = $_FILES["pic"] ?? null;

    if (strlen($uname) < 4) {
        $hasError[] = "Name should be at least 4 characters.";
    }


    if (empty($email)) {
        $hasError[] = "Email field is required.";
    } elseif (!preg_match("/@aiub\.edu$/", $email)) {
        $hasError[] = "Email address must end with '@aiub.edu'.";
    }

    if (empty($number)) {
        $hasError[] = "Phone number is required.";
    } elseif (!preg_match("/^\d+$/", $number)) {
        $hasError[] = "Phone number must contain only digits.";
    }

    if (empty($preadd)) {
        $hasError[] = "Present address is required.";
    }

    if (empty($peradd)) {
        $hasError[] = "Permanent address is required.";
    }

    if (empty($dob)) {
        $hasError[] = "Date of birth is required.";
    } else {
        $dobYear = date('Y', strtotime($dob));
        $currentYear = date('Y');
        $age = $currentYear - $dobYear;
        if ($age < 20) {
            $hasError[] = "You must be at least 20 years old.";
        }
    }

    if (empty($doj)) {
        $hasError[] = "Date of joining is required.";
    }

    if (strlen($bio) > 500) {
        $hasError[] = "Bio should not exceed 500 characters.";
    }

    if (empty($access)) {
        $hasError[] = "Access type must be selected.";
    }

    if (!isset($gender)) {
        $hasError[] = "Gender must be selected.";
    }

    if (empty($pass)) {
        $hasError[] = "Password is required.";
    } elseif (!preg_match("/[@$#!%*?&]/", $pass)) {
        $hasError[] = "Password must be at least 8 characters long and include at least one special character.";
    }

    if ($pass !== $conpass) {
        $hasError[] = "Passwords do not match.";
    }

    if (empty($nidFile)) {
        $hasError[] = "NID file is required.";
    } else {
        $nidExtension = pathinfo($nidFile["name"], PATHINFO_EXTENSION);
        if (!in_array($nidExtension, ['jpeg', 'jpg', 'png'])) {
            $hasError[] = "NID must have a valid image file extension (JPEG, JPG, or PNG).";
        }
    }
    if ($nidFile["size"] > 2 * 1024 * 1024) {
        $hasError[] = "NID file size should not exceed 2MB.";
    }

    if (empty($picFile)) {
        $hasError[] = "Profile picture is required.";
    } else {
        $picExtension = pathinfo($picFile["name"], PATHINFO_EXTENSION);
        if (!in_array($picExtension, ['jpeg', 'jpg', 'png'])) {
            $hasError[] = "NID must have a valid image file extension (JPEG, JPG, or PNG).";
        }
    }
    if ($picFile["size"] > 2 * 1024 * 1024) {
        $hasError[] = "Profile Picture size should not exceed 2MB.";
    }

    if (empty($hasError)) {

        $nidPath = $nidFile ? "../uploads/nid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION) : null;
        $picPath = $picFile ? "../uploads/pic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION) : null;

        if ($nidFile && !empty($nidFile["tmp_name"])) {
            move_uploaded_file($nidFile["tmp_name"], $nidPath);
        }
        if ($picFile && !empty($picFile["tmp_name"])) {
            move_uploaded_file($picFile["tmp_name"], $picPath);
        }

       
        $mydb = new myDB();
        $conObj = $mydb->openCon();
        $result = $mydb->insertData(
            $uname,
            $email,
            $pass,
            $access,
            $number,
            $gender,
            $bio,
            $dob,
            $doj,
            $preadd,
            $peradd,
            $nidPath,
            $picPath,
            'admin',
            $conObj
        );
        if ($result == 1) {
            header("Location:../view/login.php");
        } else {
            echo "Error";
        }
    } else {
        echo "<h2>Please correct the following errors:</h2><ul>";
        foreach ($hasError as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
