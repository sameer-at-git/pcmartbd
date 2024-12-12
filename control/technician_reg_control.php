<?php

$fnameErr = $lnameErr = $fathersNameErr = $genderErr = $dobErr = $phoneErr = $addressErr = $workAreaErr = $workHourErr = $emailErr = $passwordErr = $conpasswordErr = "";
$errorCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $fathersname = test_input($_POST["fathersname"]);
    $gender = isset($_POST["gender"]);
    $dob = test_input($_POST["dob"]);
    $phone = test_input($_POST["phone"]);
    $address = test_input($_POST["address"]);
    $experience = test_input($_POST["experience"]);
    if (isset($_POST["workhour"])) {
        $workhour = $_POST["workhour"];
    }
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

    if (empty($workhour)) {
        $workHourErr = "Preferred work hours must be selected.";
        $errorCount++;
    }

    if (empty($password)) {
        $passwordErr = "Password is required.";
        $errorCount++;
    } elseif (!preg_match("/[@#$&]/", $password)) {
        $passwordErr = "Password must contain at least one special character (@, #, $, &).";
        $errorCount++;
    }

    if (empty($email)) {
        $emailErr = "Email can't be empty.";
        $errorCount++;
    }

    if (!($password == $confirmpass)) {
        $conpasswordErr = "Password does not match";
        $errorCount++;
    }

    if ($errorCount > 0) {

        echo "<br>$lnameErr";
        echo "<br>$fathersNameErr";
        echo "<br>$genderErr";
        echo "<br>$dobErr";
        echo "<br>$phoneErr";
        echo "<br>$addressErr";
        echo "<br>$workHourErr";
        echo "<br>$emailErr";
        echo "<br>$passwordErr";
        echo "<br>$conpasswordErr";
        echo "<br>Please correct the errors above.";
    } else {
        $data = [
            "first_name" => $fname,
            "last_name" => $lname,
            "fathers_name" => $fathersname,
            "gender" => $gender,
            "dob" => $dob,
            "phone" => $phone,
            "address" => $address,
            "experience" => $experience,
            "work_hour" => $workhour,
            "email" => $email,
            "password" => $password
        ];

        $json = json_encode($data);

        $filePath = "../data/userdata.json";

        if (file_put_contents($filePath, $json)) {
            echo "Registration successful! Data saved to $filePath.";
        } else {
            echo "Failed to save data.";
        }
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
