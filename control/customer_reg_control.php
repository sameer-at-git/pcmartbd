<?php
 /////rifat   
 echo "<h2>This is CUSTOMER registration control </h2><br>";
 $fname=$_POST["firstname"];
 $lname=$_POST["lastname"];
 $ema=$_POST["cusemail"];
 $pass=$_POST["cuspass"];
 if (!empty($fname) 
    && (preg_match("/[a-zA-Z]/",$fname))
    && !empty($lname) 
    && (preg_match("/[a-zA-Z]/",$lname))) {

     echo $fname."<br>";
     echo $lname."<br>";
 } 
 else{
     echo "Name likho pio <br>";

 }
 if(!empty($ema) && (preg_match("/[.edu]/",$ema)) &&  (preg_match("/@/",$ema))){
     echo $ema."<br>";
 }
 else{
     echo "Are bu bu but email kaha hain? <br>";
 }
 if(!is_numeric($pass)){
     echo "Password e numbder daw  <br>";
 }
 else{
     echo "Password : ".$pass."<br>";
 }
 if(isset($_POST['checkbox_name'])){
     echo "Good boi <br>";
 }
 else{
     echo "Agree koro na pls !!";
 }    
 ?>