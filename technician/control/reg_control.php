<?php

session_start();
require "../model/db.php";

$fnameErr = $lnameErr = $fathersNameErr = $genderErr = $dobErr = $phoneErr = $addressErr = $workAreaErr = $workHourErr = $nidPhotoErr = $photoErr = 
$cvErr = $emailErr = $passwordErr = $conpasswordErr = "";
$errorCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $fathersname = test_input($_POST["fathersname"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $dob = test_input($_POST["dob"]);
    $phone = test_input($_POST["phone"]);
    $address = test_input($_POST["address"]);
    $experience = test_input($_POST["experience"]);
    $workarea = isset($_POST["workarea"]) ? $_POST["workarea"] : null;
    $workhour = isset($_POST["workhour"]) ? $_POST["workhour"] : null;
    $nidPhoto = $_FILES["nid"] ?? null;
    $photo = $_FILES["photo"] ?? null;
    $cv = $_FILES["cv"] ?? null;
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirmpass = test_input($_POST["confirmpass"]);




    if (empty($fname)) {
        $fnameErr = "First name is required.";
        $errorCount++;
        echo "<br>$fnameErr";
    } elseif (preg_match("/[0-9]/", $fname)) {
        $fnameErr = "First name can't contain numbers.";
        $errorCount++;
    }

    if (empty($lname)) {
        $lnameErr = "Last name is required.";
        $errorCount++;
    } elseif (preg_match("/[0-9]/", $lname)) {
        $lnameErr = "Last name can't contain numbers.";
        $errorCount++;
    }

    if (!empty($fathersname) && preg_match("/[0-9]/", $fathersname)) {
        $fathersNameErr = "Father's name can't contain numbers.";
        $errorCount++;
    }

    if (empty($gender)) {
        $genderErr = "Gender is required.";
        $errorCount++;
    }

    if (empty($dob)) {
        $dobErr = "Date of Birth is required.";
        $errorCount++;
    }

    if (empty($phone)) {
        $phoneErr = "Phone number is required.";
        $errorCount++;
    } elseif (strlen($phone) > 11) {
        $phoneErr = "Phone number must not exceed 11 digits.";
        $errorCount++;
    }

    if (empty($address)) {
        $addressErr = "Address is required.";
        $errorCount++;
    }

    if (empty($workarea)) {
        $workAreaErr = "Preferred work area must be selected.";
        $errorCount++;
    }

    if (empty($workhour)) {
        $workHourErr = "Preferred work hours must be selected.";
        $errorCount++;
    }

    if (empty($nidPhoto)) {
        $nidPhotoErr = "NID file is required.";
    } else {
        $nidExtension = pathinfo($nidPhoto["name"], PATHINFO_EXTENSION);
        if (!in_array($nidExtension, ['jpeg', 'jpg', 'png'])) {
            $nidPhotoErr = "NID must have a valid image file extension (JPEG, JPG, or PNG).";
        }
    }
    if ($nidPhoto["size"] > 2 * 1024 * 1024) {
        $nidPhotoErr = "NID file size should not exceed 2MB.";
    }

    if (empty($photo)) {
        $photoErr = "Photo is required.";
    } else {
        $photoExtension = pathinfo($photo["name"], PATHINFO_EXTENSION);
        if (!in_array($photoExtension, ['jpeg', 'jpg', 'png'])) {
            $photoErr = "Photo must have a valid image file extension (JPEG, JPG, or PNG).";
        }
    }
    if ($photo["size"] > 2 * 1024 * 1024) {
        $photoErr = "Photo file size should not exceed 2MB.";
    }

    if (empty($cv)) {
        $cvErr = "CV file is required.";
    } else {
        $cvExtension = pathinfo($cv["name"], PATHINFO_EXTENSION);
        if (!in_array($cvExtension, ['jpeg', 'jpg', 'png', 'pdf'])) {
            $cvErr = "CV must have a valid image or PDF file extension (JPEG, JPG, PNG, or PDF).";
        }
    }

    if (empty($email)) {
        $emailErr = "Email can't be empty.";
        $errorCount++;
    }

    if (empty($password)) {
        $passwordErr = "Password is required.";
        $errorCount++;
    } elseif (!preg_match("/[@#$&]/", $password)) {
        $passwordErr = "Password must contain at least one special character (@, #, $, &).";
        $errorCount++;
    }

    if (!($password == $confirmpass)) {
        $conpasswordErr = "Password does not match";
        $errorCount++;
    }

    if ($errorCount > 0) {

        echo "<br>Please correct the errors below: ";
        echo "<br>$lnameErr";
        echo "<br>$fathersNameErr";
        echo "<br>$genderErr";
        echo "<br>$dobErr";
        echo "<br>$phoneErr";
        echo "<br>$addressErr";
        echo "<br>$workAreaErr";
        echo "<br>$nidPhotoErr";
        echo "<br>$photoErr";
        echo "<br>$cvErr";
        echo "<br>$workHourErr";
        echo "<br>$emailErr";
        echo "<br>$passwordErr";
        echo "<br>$conpasswordErr";

    } else {
        // $data = [
        //     "first_name" => $fname,
        //     "last_name" => $lname,
        //     "fathers_name" => $fathersname,
        //     "gender" => $gender,
        //     "dob" => $dob,
        //     "phone" => $phone,
        //     "address" => $address,
        //     "experience" => $experience,
        //     "work_hour" => $workhour,
        //     "email" => $email,
        //     "password" => $password
        // ];

        // $json = json_encode($data);

        // $filePath = "../data/userdata.json";

        // if (file_put_contents($filePath, $json)) {
        //     echo "Registration successful! Data saved to $filePath.";
        // } else {
        //     echo "Failed to save data.";
        // }

        $nidPhotoPath = $nidPhoto ? "../../uploads/nid_" . uniqid() . "." . pathinfo($nidPhoto["name"], PATHINFO_EXTENSION) : null;
        $photoPath = $photo ? "../uploads/photo_" . uniqid() . "." . pathinfo($photo["name"], PATHINFO_EXTENSION) : null;
        $cvPath = $cv ? "../../uploads/cv_" . uniqid() . "." . pathinfo($cv["name"], PATHINFO_EXTENSION) : null;

        if ($nidPhoto && !empty($nidPhoto["tmp_name"])) {
            move_uploaded_file($nidPhoto["tmp_name"], $nidPhotoPath);
        }
        if ($photo && !empty($photo["tmp_name"])) {
            move_uploaded_file($photo["tmp_name"], $photoPath);
        }
        if ($cv && !empty($cv["tmp_name"])) {
            move_uploaded_file($cv["tmp_name"], $cvPath);
        }

        $mydb = new myDB();
        $conObj = $mydb->openCon();

        if (!$conObj) {
            die("Database connection failed.");
        }

        $result = $mydb->insertData($fname, $lname, $fathersname, $gender, $dob, $phone, $address, $experience, $workarea, $workhour, $nidPhotoPath, $photoPath, $cvPath, $email, $password,
        'technician', $conObj);

        if ($result) {
            header("Location:../../layout/view/login.php");
        } else {
            echo "Error occurred during registration.";
        }

        $mydb->closecon($conObj);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>