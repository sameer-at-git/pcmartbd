<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body >
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
                    <td><a href="login.php" class="active">Login</a></td>

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
                <div>Don't have an account? <a href="../../customer/view/sign_up.php">Sign Up</a></div>
            </div>
    </form>


    <script src="../js/login.js"></script>
</div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>