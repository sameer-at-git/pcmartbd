<?php
session_start();
include ('../model/db.php');
$customerId=$_SESSION['customer_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = array();
    
    $appointment_date = trim($_POST['appointment_date'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $details = trim($_POST['details'] ?? '');
    

    if (empty($appointment_date)) {
        $hasError[] = "Appointment Date cannot be empty";
    }
    if ($type=="...") {
        $hasError[] = "Type cannot be empty";
    }
    if (empty($details)) {
        $hasError[] = "Details cannot be empty";
    }


    if (empty($hasError)) {
        $mydb = new myDB2();
        $conObj = $mydb->openCon();
        $result = $mydb->insertAppointment($customerId,$appointment_date, $type, $details, $conObj);

        if ($result) {
            header("Location: ../view/repair.php");
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
