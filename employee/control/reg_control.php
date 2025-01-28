<?php
///////sameer
$uname = $_POST["uname"];
$email = $_POST["email"];
$access = $_POST["permit"];
$number = $_POST["phone"];


if (strlen($uname) < 4) {
    echo "Name should be at least 4 characters<br>";
} else {
    echo "Admin Full name: " . ($uname) . "<br>";
}

if (empty($email)) {
    echo "Email field is required<br>";
} elseif (!preg_match("/[aiub.edu]$/", $email)) {
    echo "Email address must contain aiub.edu<br> ";
} else {
    echo "Admin Email: " . ($uname) . "<br>";
}


if (empty($number)) {
    echo "Must be Filled<br>";
} elseif (!preg_match("/[0-9]$/", $number)) {
    echo "Must be only Number<br>";
} else {
    echo "Admin Phone Number: " . ($number) . "<br>";
}

if ($access == 0) {
    echo "Must select One <br>";
    echo"<br>";
} else {
    if ($access == 1) {
        echo "Admin Access Type: Full control <br>";
    } elseif ($access == 2) {
        echo "Admin Access Type: Poduct control <br>";
    } else {
        echo "Admin Access Type: Employee control <br>";
    }
}

?>

<?php
/////alvi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ename = (trim($_POST["fname"]));
    $ephone = $_POST["number"];

    if (strlen($ename) > 40) {
        echo "Name can be Maximum of 40 Charactars" . "<br>";
    }
    if (!empty($_POST['pass'])) {
        $epass = $_POST['pass'];
        if (preg_match("/[a-z]/", $epass) && strlen($epass) >= 8) {
            echo "Valid Password" . "<br>";
        } else {
            echo "Invalid Password" . "<br>";
        }
    }
    else {
        echo "Enter Password" . "<br>";
    }
    if (empty($_POST["employment"])) {
        echo "Please select an Employment type" . "<br>";
    }
    if (preg_match("/^0\d{10}$/", $ephone)) {
        echo "Valid Phone Number" . "<br>";
    } else {
        echo "Invalid Phone Number" . "<br>";
    }
}
?>


<?php
/////tamjid
$fnameErr = $lnameErr = $passwordErr = $dobErr = $phoneErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $password = test_input($_POST["password"]);
    $dob = test_input($_POST["dob"]);
    $phone = test_input($_POST["phone"]);

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
<?php
/////rifat   
$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$ema = $_POST["email"];
$pass = $_POST["password"];
if ((!empty($fname) && (preg_match("/[a-zA-Z]/", $fname)) && preg_match('/[A-Z]/', $fname)) && (!empty($lname) && (preg_match("/[a-zA-Z]/", $lname)) && preg_match('/[A-Z]/', $fname))) {
    echo $fname . "<br>";
    echo $lname . "<br>";
} else {
    echo "Error found <br>";

}
if (!empty($ema) && (preg_match("/[.edu]/", $ema)) && (preg_match("/@/", $ema))) {
    echo $ema . "<br>";
} else {
    echo "Error Found <br>";
}
if (is_numeric($pass)) {
    echo "Error Found <br>";
} else {
    echo "Password : " . $pass . "<br>";
}
if (isset($_POST['checkbox_name'])) {
    echo "Correct <br>";
} else {
    echo "Error Found";
}
?>