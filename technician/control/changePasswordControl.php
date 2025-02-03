<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit;
}

require __DIR__ . '../../model/db.php';

function validateCurrentPassword($currentPassword)
{
    if (empty($currentPassword)) {
        return "Current password cannot be empty.";
    }
    return "";
}

function validateNewPassword($newPassword)
{
    $hasUpperCase = preg_match('/[A-Z]/', $newPassword);
    $hasLowerCase = preg_match('/[a-z]/', $newPassword);
    $hasNumber = preg_match('/[0-9]/', $newPassword);
    $hasSpecialChar = preg_match('/[!@#$%^&*(),.?":{}|<>]/', $newPassword);

    if (empty($newPassword)) {
        return "New password cannot be empty.";
    }
    if (strlen($newPassword) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!$hasUpperCase) {
        return "Password must include at least one uppercase letter.";
    }
    if (!$hasLowerCase) {
        return "Password must include at least one lowercase letter.";
    }
    if (!$hasNumber) {
        return "Password must include at least one number.";
    }
    if (!$hasSpecialChar) {
        return "Password must include at least one special character (!@#$%^&*(),.?\":{}|<>).";
    }
    return "";
}

function validateConfirmPassword($newPassword, $confirmPassword)
{
    if ($confirmPassword !== $newPassword) {
        return "Passwords do not match.";
    }
    return "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['currentPasswordError'] = "";
    $_SESSION['newPasswordError'] = "";
    $_SESSION['confirmPasswordError'] = "";

    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    $_SESSION['currentPasswordError'] = validateCurrentPassword($currentPassword);
    $_SESSION['newPasswordError'] = validateNewPassword($newPassword);
    $_SESSION['confirmPasswordError'] = validateConfirmPassword($newPassword, $confirmPassword);

    if (!empty($_SESSION['currentPasswordError']) || !empty($_SESSION['newPasswordError']) || !empty($_SESSION['confirmPasswordError'])) {
        header("Location: ../view/functions/changePassword.php");
        exit;
    }

    $mydb = new myDB();
    $conObj = $mydb->openCon();
    $user_id = $_SESSION['user_id'];
    $technician_id = $_SESSION['technician_id'];

    $result = $mydb->getUserInfo($conObj, $technician_id);
    $currentDatabasePassword = $result['password'];

    if ($currentDatabasePassword !== $currentPassword) {
        $_SESSION['currentPasswordError'] = "Your current password is incorrect.";
        header("Location: ../view/functions/changePassword.php");
        exit;
    }

    if ($currentPassword === $newPassword) {
        $_SESSION['newPasswordError'] = "New password cannot be the same as the current password.";
        header("Location: ../view/functions/changePassword.php");
        exit;
    }

    if ($mydb->updatePassword($conObj, $technician_id, $user_id, $newPassword)) {
        $_SESSION['successMessage'] = "Password updated successfully.";
        header("Location: ../view/functions/changePassword.php");
        exit;
    } else {
        $_SESSION['newPasswordError'] = "Error updating password. Please try again.";
        header("Location: ../view/functions/changePassword.php");
        exit;
    }
    $myDB->closecon($conObj);
}
