<?php
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
    $access = $_POST["permit"] ?? 0;
    $email = trim($_POST["email"] ?? "");
    $pass = $_POST["pass"] ?? "";
    $conpass = $_POST["conpass"] ?? "";
    $nidFile = $_FILES["nid"] ?? null;
    $picFile = $_FILES["pic"] ?? null;

    if (strlen($uname) < 4) {
        $hasError[] = "Name should be at least 4 characters.";
    }

    if (empty($fname)) {
        $hasError[] = "Father's name is required.";
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
        $allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!in_array($nidFile["type"], $allowedTypes)) {
            $hasError[] = "NID must be a JPEG, JPG, or PNG image.";
        }
    }

    if (empty($picFile)) {
        $hasError[] = "Profile picture is required.";
    } else {
        $allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!in_array($picFile["type"], $allowedTypes)) {
            $hasError[] = "Profile picture must be a JPEG, JPG, or PNG image.";
        }
    }

    if (!empty($hasError)) {
        echo "<h2>Please correct the following hasError:</h2>";
        echo "<ul>";
        foreach ($hasError as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        /* $nidPath = "../uploads/nid_" . uniqid() . "." . pathinfo($nidFile["name"], PATHINFO_EXTENSION);
        $picPath = "../uploads/pic_" . uniqid() . "." . pathinfo($picFile["name"], PATHINFO_EXTENSION);

        move_uploaded_file($nidFile["tmp_name"], $nidPath);
        move_uploaded_file($picFile["tmp_name"], $picPath);
*/
        $data = [
            "username" => $uname,
            "email" => $email,
            "accessType" => $access,
            "number" => $number,
            "gender" => $gender,
            "bio" => $bio,
            "dob" => $dob,
            "doj" => $doj,
            "presentAddress" => $preadd,
            "permanentAddress" => $peradd
            //"nidPath" => $nidPath,
            //"picPath" => $picPath
        ];

        $filePath = "../data/adm_data.json";
        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $users = json_decode($jsonData, true);
            if (!is_array($users)) {
                $users = [];
            }
        } else {
            $users = [];
        }

        $users[] = $data;
        if (file_put_contents($filePath, json_encode($users, JSON_PRETTY_PRINT))) {
            echo "Successfully registered";
        } else {
            echo "Failed to save data";
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
            $nidFile,
            $picFile,
            'admin',
            $conObj
        );
        if ($result == 1) {
            echo "<br>" . "Success";
        } else {
            echo "Error";
        }
    }
}
?>
