<?php
$db_server = "localhost:3307";
$db_username = "root";
$db_password = "";
$db_name = "mydb";
$conn="";
try{
    $conn = new mysqli($db_server, $db_username, $db_password,$db_name); 
}
catch(mysqli_sql_exception){
    echo "could not connect <br>";
}
if ($conn) {
    echo "You are connected <br>";
} else {
    echo "Not connected <br>";
}
?>
