<?php
include '../model/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['useremail'];
    
    $db = new UserDB();
    $conn = $db->openCon();
    
    $user = $db->getUserByEmail($email, $conn);
    
    if ($user) {
        $_SESSION['password'] = $user['password'];
        $_SESSION['message'] = "Your password is: " . $user['password'];
        header("Location: ../view/forget_password.php");
    } else {
        $_SESSION['message'] = "No account found with this email address.";
        header("Location: ../view/forget_password.php");
    }
    
    $db->closeCon($conn);
    exit();
}
?>
