<?php
session_start();
include ('../model/db.php');
$customerId=$_SESSION['customer_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();

    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cardType = trim($_POST['card_type'] ?? '');

    if (empty($name)) {
        $hasError[] = "Name cannot be empty.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $hasError[] = "Name can only contain letters and spaces.";
    }
    if (empty($address)) {
        $hasError[] = "Address cannot be empty";
    }
    if (empty($email)) {
        $hasError[] = "Email cannot be empty.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError[] = "Invalid email format.";
    }
    if ($cardType=="...") {
        $hasError[] = "Card Type cannot be empty";
    }
    if (empty($hasError)) {
        $mydb = new myDB2();
        $conObj = $mydb->openCon();
        $result = $mydb->insertPayment($customerId,$name,$email,$cardType, $conObj);

        if ($result) {
            header("Location: ../view/browse.php");
            exit();
        }
        
        $mydb->closecon($conObj);
    }
    else{
        foreach($hasError as $error){
            echo $error." <br>";
        }
    }
}
?>
