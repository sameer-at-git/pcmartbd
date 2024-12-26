<?php
include '../control/showUser_control.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile Info</title>
</head>
<body>
    <header>
        <h1>Admin Profile Information</h1>
        <nav>
            <a href="home.php">Home</a> |
            <a href="about.php">About Us</a> |
            <a href="contact.php">Contact</a> |
            <a href="../control/sessionout.php">Logout</a>
        </nav>
    </header>

    <main>
        <?php
        echo $adminProfileHTML ?? "<p>No user data found.</p>";
        ?>
    </main>

    <footer>
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </footer>
</body>
</html>