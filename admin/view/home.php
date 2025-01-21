<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}?>

<html>

<head>
    <title> Home</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/notificationstyle.css">


</head>

<body>
<div class="navbar">
<table>
            <tr>
                <td><a href="home.php" class="active">Home</a></td>
                <td><a href="admin_home.php">Dashboard</a></td>
                <td><a href="notifications.php">Notifications</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
</div>
    <h1> This is Home Page </h1>
</body>
</html>