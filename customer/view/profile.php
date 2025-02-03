<?php
session_start();
if (!isset($_SESSION['customer_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../layout/view/login.php');
    exit();
}

include '../model/db.php';
$db = new myDB2();
$conn = $db->openCon();
$customer_id = $_SESSION['customer_id'];
$userInfo = $db->getCustomerInfo($conn, $customer_id);
$user=$userInfo->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>

<div class="header">
    <div class="logo-container">
        <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="browse.php" id="website-name"><p>PCMartBD</p></a>
    </div>
</div>

<div class="navbar">
    <ul>
        <li><a href="browse.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="repair.php">Repair</a></li>
        <li><a href="../control/sessionout.php">Logout</a></li>
    </ul>
</div>

<div class="profile-container">
    <h2>Customer Profile</h2>
    <form id="profileForm" method="POST" action="../control/profile_validation.php" onsubmit="validateProfileForm(event)">
        <label>Name:</label>
        <input type="text" id="name" name="name" value="<?= $user['name'] ?>">
        <div class="error-message" id="nameError"></div>

        <label>Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>">
        <div class="error-message" id="phoneError"></div>

        <label>Address:</label>
        <textarea id="address" name="address"><?= $user['address'] ?></textarea>
        <div class="error-message" id="addressError"></div>

        <label>Email:</label>
        <input type="email" id="email" name="email" value="<?= $user['email'] ?>">
        <div class="error-message" id="emailError"></div>

        <label>Password :</label>
        <input type="password" id="password" name="password" value="<?= $user['password'] ?>">
        <div class="error-message" id="passError"></div>

        <button type="submit">Update Profile</button>
    </form>
    <script src="../js/profile.js"></script>
</div>

<div class="footer">
    <p>&copy; 2024 PCMartBD. All rights reserved.</p>
</div>

</body>
</html>
