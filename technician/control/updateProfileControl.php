<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit;
}

require __DIR__ . "../../model/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"] ?? "");
    $lname = test_input($_POST["lname"] ?? "");
    $fathersname = test_input($_POST["fathersname"] ?? "");
    $gender = $_POST["gender"] ?? null;
    $dob = test_input($_POST["dob"] ?? "");
    $phone = test_input($_POST["phone"] ?? "");
    $address = test_input($_POST["address"] ?? "");
    $experience = test_input($_POST["experience"] ?? "");
    $workarea = $_POST["workarea"] ?? null;
    $workhour = $_POST["workhour"] ?? null;
    $photo = $_FILES["photo"] ?? null;
    $email = test_input($_POST["email"] ?? "");

    $user_id = $_SESSION['user_id'];
    $technician_id = $_SESSION['technician_id'];

    $mydb = new myDB();
    $conObj = $mydb->openCon();

    if (empty($fname)) {
        $errors[] = "First name is required.";
    } elseif (preg_match("/[0-9]/", $fname)) {
        $errors[] = "First name cannot contain numbers.";
    }

    if (empty($lname)) {
        $errors[] = "Last name is required.";
    } elseif (preg_match("/[0-9]/", $lname)) {
        $errors[] = "Last name cannot contain numbers.";
    }

    if (!empty($fathersname) && preg_match("/[0-9]/", $fathersname)) {
        $errors[] = "Father's name cannot contain numbers.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) {
        $errors[] = "Phone number must be 10-11 digits.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($workarea)) {
        $errors[] = "Preferred work area must be selected.";
    }

    if (empty($workhour)) {
        $errors[] = "Preferred work hours must be selected.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif ($mydb->checkEmailExists($conObj, $email, $user_id)) {
        $errors[] = "Email is already in use by another user.";
    }

    $photoPath = null;
    if ($photo && !empty($photo["tmp_name"])) {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            $errors[] = "Photo must be a JPG, JPEG, or PNG file.";
        } elseif ($photo["size"] > 5 * 1024 * 1024) { 
            $errors[] = "Photo must not exceed 5MB.";
        } else {
            $photoPath = "../uploads/photo_" . uniqid() . "." . $extension;
            if (!move_uploaded_file($photo["tmp_name"], $photoPath)) {
                $errors[] = "Failed to upload the photo. Please try again.";
            }
        }
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../view/functions/updateProfile.php");
        exit;
    }

    $result = $mydb->updateProfile($conObj, $technician_id, $user_id, $fname, $lname, $fathersname, $gender, $dob, $phone, $address, $experience, $workarea, $workhour, $photoPath, $email);

    if ($result) {
        $_SESSION['successMessage'] = "Profile updated successfully.";
        header("Location: ../view/functions/updateProfile.php");
        exit;
    } else {
        $_SESSION['errors'] = ["Failed to update profile. Please try again."];
        header("Location: ../view/functions/updateProfile.php");
        exit;
    }
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$userInfo = $mydb->getUserInfo($conObj, $technician_id);

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}


$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$userInfo = $mydb->getUserInfo($conObj, $technician_id);
