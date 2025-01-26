<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Profile</title>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "User"; ?></h1>
        <nav>
            <a href="home.php">Home</a> |
            <a href="about.php">About Us</a> |
            <a href="contact.php">Contact</a> |
            <a href="viewAppointment.php">View Appointments</a> |
            <a href="../control/sessionout.php">Logout</a>
        </nav>
    </header>

    <main>
        <form action="showUsers.php" method="get">
            <button type="submit">Show Info</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </footer>
</body>
</html>
