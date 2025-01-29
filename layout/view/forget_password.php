<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body class="login-page">
<div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
        <div class="signup">
            <a href="../../customer/view/sign_up.php" class="signup-link">Create Account</a>
        </div>
    </div>
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php" >Login</a></td>

                </tr>
            </table>
        </div>
    </div>

    <div class="login-container">
        <div class="forgot-password-header">
            <h1>Forgot Password</h1>
        </div>
        
        <form class="forgot-password-form" action="../control/forget_pass_control.php" method="POST">
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
                <input type="text" name="useremail" placeholder="Enter your email address"  >
            </fieldset>
            
            <input type="submit" value="Get Password">
            
            <div class="login-links">
                <div>Remember your password? <a href="login.php">Login</a></div>
            </div>
        </form>
    </div>
    <div class="fp-footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>