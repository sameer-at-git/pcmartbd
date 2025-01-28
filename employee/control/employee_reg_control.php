<?php
include "../model/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = (trim($_POST["fname"]));
    $lname = (trim($_POST["lname"]));
    $ephone = $_POST["number"];
    $dob= $_POST["dob"];
    $address = $_POST["adress"];
    $paddress = $_POST["adresss"];
    $egender = $_POST["gender"];
    $mstat = "Unmarried";
    $dateofj = $_POST["doj"];
    $employment = $_POST["employment"];
    $email = $_POST["emai"];
    $epass = $_POST['pass'];
    $conpass = $_POST['confirmpass'];
    $cv = $_POST["cv"];
    $approved = 0;

    $hasError = []; //To show errors

//First name
    if (strlen($ename) > 40) {
        $hasError[] = "Firstname can not be more than 40 characters";
    } 

//Phone
    if (!preg_match("/^0\d{10}$/", $ephone)) {
        $hasError[] = "Phone number must start with 0 and have 11 numbers";
    } 

//DOB
    if (empty($dob)) {
        $hasError[] = "Enter Date Of Birth";
    } 

//Address
    if (empty($address)) {
        $hasError[] = "Enter Present Address";

    }

//Permanant Address
    if (empty($paddress)) {
        $hasError[] = "Enter Permanent Address";
    }

//Gender
    if (!isset($egender)) {
        $hasError[] = "Select a gender";
    }

//Maritial Status is always selected

//DOJ
    if (empty($_POST["doj"])) {
        $hasError[] = "Enter Joining Date";
    }

//Employment
    if (!isset($employment)) {
        $hasError[] = "Select an Employment type";
    }

//Email
    if (empty($_POST["emai"])) {
        $hasError[] = "Enter Email"; 
    }

//Password
    if (!empty($epass)) {

        if (!preg_match("/[a-z]/", $epass) && strlen($epass) >= 8) {
            $hasError[] = "Invalid Password";
        }
    } else {
        $hasError[] = "Enter a Password";
    }

//Confirm Password
    if(!empty($conpass)){
        if($conpass == $epass){
        }
        else{
            $hasError[] = "Password does not match";
        }
    }

    if (!empty($hasError)) {
        echo "<h2>Please correct the following hasError:</h2>";
        echo "<ul>";
        foreach ($hasError as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    else{
        $mydb=new myDB();
        $conObj=$mydb->openCon();
        $result=$mydb->addEmployee(
            $fname,
            $lname,
            $ephone,
            $dob,
            $address,
            $paddress,
            $egender,
            $mstat,
            $dateofj,
            $employment,
            $email,
            $epass,
            $approved,
            $conObj
        );
        if($result==1){
            header("../view/login.php");

        }
        else{
            echo "Error";
        }
    }



    /*if ($valid == 6) {
        $data = ["name" => $ename, "password" => $_POST["pass"], "employment" => $_POST["employment"], "phonenumber" => $ephone, "gender" => $egender, "email" => $_POST["emai"]];
        $json = json_encode($data);
        file_put_contents("../data/userdata.json", $json);
    } */
}
?>
