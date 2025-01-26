<html>
<head>
    <title>Customer</title>
</head>
<body>
    <form action="../../control/customer_reg_control.php" method="POST">
        <h1>Customer registration</h1>
        <fieldset>
            <legend>Customer Information</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                     <td><input type="text" name="firstname" placeholder="First name" ></td>
                     <td>Last Name:</td>
                     <td><input type="text" name="lastname" placeholder="last name" ></td>
                
                
                
                    </tr>
             
                <tr>
                    <td>Mobile Number :</td>
                
                    <td><input type="text" name="cusnumber"> * </td>
                </tr>
            
                <tr>
                    <td>Address :</td>
                    <td><input type="text"  placeholder="City"></td></tr>
                    <tr><td></td>
                    <td><input type="text"  placeholder="Region"></td>
                </tr>
                <tr>
                   <td></td> <td><input type="text" placeholder="Additional Information"></td>
            </tr> </table>
            
        </fieldset>
        <br>
        <fieldset>
            <legend>Account Details</legend>
            <table>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="cusemail" placeholder="abcd@gmail.com" size="39" required> *</td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="cuspass" placeholder="Enter Your Password" size="39"> *</td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password"  name="cusconpass" placeholder="Enter Your Password" size="39"> *</td>
                </tr>
                <tr>
                    <td>Have an Account ? <a href="../login.php"> Sign in</a></td>
                </tr>
            </table>
        </fieldset>
        <br>
        <fieldset>
        <table>
            <tr>
<td><input type="checkbox" name="checkbox_name" >I agree to Terms and conditions

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