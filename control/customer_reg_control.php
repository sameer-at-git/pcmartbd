<?php
 /////rifat
 echo "<h2>This is CUSTOMER registration control </h2><br>";
 $fname=$_POST["firstname"];
 $lname=$_POST["lastname"];
 $ema=$_POST["cusemail"];
 $pass=$_POST["cuspass"];
 $pnum=$_POST["cusnumber"];
 $count=0;
 if ((preg_match("/[A-Za-z]/", $fname) && preg_match("/[A-Z]/",$fname) && !preg_match("/[0-9]/",$fname))
    && preg_match("/[A-Za-z]/", $lname) && preg_match("/[A-Z]/",$lname) && !preg_match("/[0-9]/",$lname)) {
    echo "Correct  Name<br>";
     $count++;
 } 
 else{
     echo "Must contain only alphabets, include at least a uppercase letters <br>";

 }
 if(!empty($ema) && (preg_match("/[.edu]/",$ema)) &&  (preg_match("/@/",$ema))){
    echo "Correct Email <br>";
     $count++;
 }
 else{
     echo "Must contain @ and .xyz domain <br>";
 }
 if(!empty($pass) && preg_match("/[0-9]/",$pass) && strlen($pass)>6){
    echo "Correct Password<br>";
     $count++;
}
else{
     echo "Must contain one numeric character  <br>";
 }
 if(isset($_POST['checkbox_name'])){
    echo "Correct <br>";
     $count++;
 }
 else{
     echo "Agree pls !! <br>";
 }
 if($count==4){
    $data=["First_Name"=>$_POST["firstname"],"Last_Name"=>$_POST["lastname"],"Phone_Number"=>$_POST["cusnumber"],"Email"=>$_POST["cusemail"],"Password"=>$_POST["cuspass"]];
    $json=json_encode($data);
    file_put_contents("../data/userdata.json",$json);
    echo "Success";
 }
else{
    echo "pls fill correctly from all required fill <br>";
}
 


 ?>