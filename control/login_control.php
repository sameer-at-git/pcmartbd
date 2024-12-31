<?php
session_start();
require '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["useremail"] ?? "");
    $password = trim($_POST["userpass"] ?? "");

    if (empty($email) || empty($password)) {
        echo "Please fill in both email and password.";
    } else {
        $db = new myDB(); 
        $connectionobject = $db->openCon(); 

        if (!$connectionobject) {
            die("Database connection not established.");
        }

     
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $result = $connectionobject->query($sql);

        if ($result && $result->num_rows > 0) {
            
            $user = $result->fetch_assoc();
            if ($user['password'] === $password) {
                
                $_SESSION['user_id'] = $user['admin_id']; 
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name']; 
                $_SESSION['user_access'] = $user['access']; 
                header("Location: ../view/admin_home.php");
                exit();
            } else {
           
                echo "Password does not match.";
            }
        } else {
            
            echo "Email not found.";
        }

        $db->closecon($connectionobject); 
    }
}
