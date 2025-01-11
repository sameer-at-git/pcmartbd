<?php
session_start();
require '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["useremail"] ?? "");
    $password = trim($_POST["userpass"] ?? "");

    if (empty($email) || empty($password)) {
        echo "Please fill in both email and password.";
        exit;
    }

    $db = new myDB();
    $user = $db->getAdminByEmail($email);
    
    if ($user && $user['password'] === $password) {
        $_SESSION['user_id'] = $user['admin_id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_access'] = $user['access'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
