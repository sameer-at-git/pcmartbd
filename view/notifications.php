<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}?>

<html>

<head>
    <title> Home</title>
</head>

<body>
    <nav>
        <table>
            <tr>
                <td><a href="home.php">Home</a></td>
                <td><a href="admin_home.php">Dashboard</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
    </nav>
</body>
</html>