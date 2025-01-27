<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body class="login-page">
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
                </tr>
            </table>
        </div>
    </div>

    <div class="login-container">
        <div class="login-header">
            <h1>Login</h1>
        </div>
        
        <form class="login-form" action="../control/login_control.php" method="POST" onsubmit="validateLoginForm(event)">
            <div class="form-field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email">
                <div class="error-message" id="emailError"></div>
            </div>
            
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <div class="error-message" id="passwordError"></div>
            </div>
            
            <button type="submit" class="login-button">Log In</button>
            
            <div class="login-links">
                <div><a href="forget_password.php">Forgot Password?</a></div>
                <div>Don't have an account? <a href="../admin/view/sign_up/admin_registration.php">Sign Up</a></div>
            </div>
    </form>


    <script src="../js/login.js"></script>

</body>

</html>