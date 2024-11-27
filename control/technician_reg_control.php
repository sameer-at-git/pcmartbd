<?php
 /////tamjid
 $fnameErr = $lnameErr = $passwordErr = $dobErr = $phoneErr = "";
 echo "<h2>This is TECHNICIAN registration control </h2><br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["tecfirstname"]);
    $lname = test_input($_POST["teclastname"]);
    $password = test_input($_POST["tecpass"]);
    $dob = test_input($_POST["tecdob"]);
    $phone = test_input($_POST["tecnum"]);

    if (empty($fname)) {
        $fnameErr = "First name is required";
        echo "<br>$fnameErr<br>";
    } else {
        if (preg_match("/[0-9]/", $fname)) {
            $fnameErr = "Your first name can't contain any numbers";
            echo "<br>$fnameErr<br>";
        }
    }
    if (empty($lname)) {
        $lnameErr = "Last name is required";
        echo "<br>$lnameErr<br>";
    } else {
        if (preg_match("/[0-9]/", $lname)) {
            $lnameErr = "Your last name can't contain any numbers";
            echo "<br>$lnameErr<br>";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password is required";
        echo "<br>$passwordErr<br>";
    } else {
        if (!preg_match("/[@#$&]/", $password)) {
            $passwordErr = "Password must contain one of the special character(@ or # or $ or &).";
            echo "<br>$passwordErr<br>";
        }
    }
    if (empty($phone)) {
        $phoneErr = "Phone number is required.";
        echo "<br>$phoneErr<br>";
    } elseif (strlen($phone) > 11) {
        $phoneErr = "Phone number must not be longer than 11 digits.";
        echo "<br>$phoneErr<br>";
    }
    if (empty($dob)) {
        $dobErr = "Valid Date of Birth is required.";
        echo "<br>$dobErr<br>";
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