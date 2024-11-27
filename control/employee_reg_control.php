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