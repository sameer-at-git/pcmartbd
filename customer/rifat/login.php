<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="Home.php" method="POST">
        <h1>Login</h1>
        <fieldset>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="useremail" placeholder="abcd@gmail.com" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="userpass" placeholder="Enter Your Password" required></td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" value="Log In">
        <div class="signup">
            <p>Don't have an account? <a href="sign_up/customer_registration.php">Sign Up</a></p>
        </div>
    </form>
</body>
</html>
