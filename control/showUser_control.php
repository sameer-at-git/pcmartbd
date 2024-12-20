
<?php
include '../model/db.php';
$mydb=new myDB();
$conobj=$mydb->opencon();
$results=$mydb->showUser("admin",$conobj);
if($results->num_rows>0){
  foreach($results as $data){
	echo $data["id"];
	echo $data["name"];
	echo "<img src=' ".$data["propic"]." ' 'alt='Profile Picture'>";
	echo "<br>";
	echo $data["id"];
	}
}
else{
echo "No users found";
}
$mydb->closeCon($conobj);
?>