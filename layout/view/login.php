<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <form class="login-form" action="../control/login_control.php" method="POST">
        <h1>Login</h1>
        <fieldset>
            <table>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="useremail" placeholder="abcd@gmail.com" required></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="userpass" placeholder="Enter Your Password"></td>
                </tr>
            </table>
        </fieldset>
        
        <div class="login-links">
            <a id="fp" href="forget_password.php">Forgot Password</a>
            <input type="submit" value="Log In">
            <div>Don't Have an Account? <a href="../admin/view/sign_up/admin_registration.php">Sign Up</a></div>
        </div>
    </form>




</body>

</html>