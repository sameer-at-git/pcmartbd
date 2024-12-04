<?php

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ename = (trim($_POST["fname"]));
    $ephone = $_POST["number"];
    $valid= 0;

    if (strlen($ename) > 40) {
        echo "Name can be Maximum of 40 Charactars" . "<br>";
    }
    else
    {
        $valid++;
    }
    if (!empty($_POST['pass'])) {
        $epass = $_POST['pass'];
        if (preg_match("/[a-z]/", $epass) && strlen($epass) >= 8) {
            echo "Valid Password" . "<br>";
            $valid++;
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
    else {
        $valid++;
    }
    if (preg_match("/^0\d{10}$/", $ephone)) {
        echo "Valid Phone Number" . "<br>";
        $valid++;
    } else {
        echo "Invalid Phone Number" . "<br>";
    }
    if(isset($_POST["gender"])) {
        $egender = $_POST["gender"];
        $valid++;
    }
    else{
        echo "Select a gender" . "<br>";
    }
    if(isset($_POST["emai"])) {
        $valid++;
    }else
    {
        echo "Enter Email";
    }
    if($valid==6){
      $data = ["name"=>$ename,"password"=>$_POST["pass"], "employment"=>$_POST["employment"], "phonenumber" =>$ephone, "gender" => $egender, "email" =>$_POST["emai"]] ;
      $json = json_encode( $data );
      file_put_contents("../data/userdata.json", $json);
    }
}
?>