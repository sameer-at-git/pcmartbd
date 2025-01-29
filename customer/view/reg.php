<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <form action="Validlogin.php" method="POST">
        <h1>Customer Registration</h1>
        <fieldset>
            <legend>Customer Information</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="firstname" placeholder="First name"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lastname" placeholder="Last name"></td>
                </tr>
                <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" name="cusnumber" placeholder="Phone" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" placeholder="City"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" placeholder="Region"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" placeholder="Additional Information"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Account Details</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="cusemail" placeholder="abcd@gmail.com" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="cuspass" placeholder="Enter Your Password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="cusconpass" placeholder="Confirm Your Password" required></td>
                </tr>
                <tr>
                    <td>Have an Account?</td>
                    <td><a href="../login.php">Sign in</a></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <table>
                <tr>
                    <td>
                        <input type="checkbox" name="checkbox_name" required>
                        I agree to Terms and Conditions
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Create Account"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
