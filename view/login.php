<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<form action="../control/reg_control.php" method="POST">
        <h1>Login</h1>
        <fieldset>
          
            <table>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="useremail" placeholder="abcd@gmail.com" size="39" required> *</td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="userpass" placeholder="Enter Your Password" size="39"> *</td>
                </tr>
                </table>
        </fieldset>
        <table>
            <tr>
                    <td><input type="submit" value="Log In"></td>
                    </tr><tr> 
                    <td>Don't Have an Account ? <a href="sign_up/customer_registration.php"> Sign Up</a></td>
               
                    
            </tr>
        </table>
    </form>

                


</body>
</html>