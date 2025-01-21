<?php
session_start();
require_once('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();
    
    // Get form data
    $uname = trim($_POST['uname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = trim($_POST['pass'] ?? '');
    $access = trim($_POST['permit'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $bio = trim($_POST['bio'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $doj = trim($_POST['doj'] ?? '');
    $preadd = trim($_POST['preadd'] ?? '');
    $peradd = trim($_POST['peradd'] ?? '');
    
    // File handling
    $nidFile = $_FILES['nid'] ?? null;
    $picFile = $_FILES['propic'] ?? null;

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
        $mydb = new myDB();
        $conObj = $mydb->openCon();

        // Check if email already exists
        if ($mydb->checkEmailExists($email, $conObj)) {
            $hasError[] = "Email already exists!";
        } else {
            $nidPath = $nidFile ? "../uploads/nid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION) : null;
            $picPath = $picFile ? "../uploads/pic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION) : null;

            // Handle file uploads
            if ($nidFile && !empty($nidFile["tmp_name"])) {
                move_uploaded_file($nidFile["tmp_name"], $nidPath);
            }
            if ($picFile && !empty($picFile["tmp_name"])) {
                move_uploaded_file($picFile["tmp_name"], $picPath);
            }

            // Insert into both tables
            $result = $mydb->insertAdmin(
                $uname, $email, $pass, $access, $number, 
                $gender, $bio, $dob, $doj, $preadd, 
                $peradd, $nidPath, $picPath, $conObj
            );

            if ($result) {
                $_SESSION['success_message'] = "Admin registered successfully!";
                header("Location: ../view/login.php");
                exit();
            } else {
                $hasError[] = "Database error occurred. Please try again.";
            }
        }
        $mydb->closecon($conObj);
    }
}
?>
