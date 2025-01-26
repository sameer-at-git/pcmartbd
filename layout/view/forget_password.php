<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body class="login-page">
    <nav class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                </tr>
            </table>
        </div>
    </nav>

    <form class="login-form" action="../control/forget_pass_control.php" method="POST">
        <h1>Forgot Password</h1>
        
        <div class="message">
            <?php 
                session_start();
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['password']);
                    session_destroy();
                }
            ?>
        </div>

        <fieldset>
            <input type="email" name="useremail" placeholder="Enter your email address" required>
        </fieldset>
        
        <input type="submit" value="Get Password">
        
        <div class="login-links">
            <div>Remember your password? <a href="login.php">Login</a></div>
        </div>
    </form>
</body>

</html>
