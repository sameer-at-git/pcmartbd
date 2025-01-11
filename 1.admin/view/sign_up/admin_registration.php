<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Registration</title>
</head>

<body>
    <h2>Admin Registration</h2>
    <form action="../../control/admin_reg_control.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Personal Information</b></legend>
            <table>
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="fullname" placeholder="Enter Full Name"></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                        <label for="101">
                            <input type="radio" name="gender" value="Male" id="101">Male
                        </label>
                        <label for="102">
                            <input type="radio" name="gender" value="Female" id="102">Female
                        </label>
                        <label for="103">
                            <input type="radio" name="gender" value="Others" id="103">Others
                        </label>
                    </td>

                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="number" name="phone"></td>
                    <td>National ID :</td>
                    <td><input type="file" name="nid"></td>

                </tr>
                <tr>
                    <td>Present Address :</td>
                    <td><textarea name="preadd" id="" cols="30" rows="4" placeholder="Enter Your Present Address"></textarea></td>
                    <td>Photo :</td>
                    <td><input type="file" name="pic"></td>
                </tr>
                </tr>
                <tr>
                    <td>Permanent Address :</td>
                    <td><textarea name="peradd" id="" cols="30" rows="4" placeholder="Enter Your Permanent Address"></textarea></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td>Date of Birth :</td>
                    <td>
                        <input type="date" name="dob">

                    </td>
                </tr>
            </table>
        </fieldset>
        <br>
        <fieldset>
            <legend><b>Joining Information</b></legend>
            <table>

                <tr>

                </tr>
                <tr>
                    <td>Date of Joining :</td>
                    <td><input type="date" name="doj"></td>
                </tr>
                <tr>
                    <td>Bio/Link :</td>
                    <td>
                        <input type="text" name="bio" placeholder="Enter Portfolio or Github Link">
                    </td>
                </tr>
            </table>
        </fieldset>
        <br>
        <fieldset>
            <legend><b>Admin Access Information</b></legend>
            <table>

                <tr>
                    <td>Select Permissions :</td>
                    <td><select name="permit">
                            <option value="0"></option>
                            <option value="Full Control">Full Control</option>
                            <option value="Product Control">Product Control</option>
                            <option value="Employee Control">Employee Control</option>
                        </select>
                    </td>
                </tr>

            </table>
        </fieldset>


        <br>
        <fieldset>
            <legend><b>Login Details</b></legend>
            <table>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="email" placeholder="abcd@aiub.edu"></td>
                </tr>
                <tr>
                    <td> Temporary Password :</td>
                    <td><input type="password" name="pass" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td>Confirm Temporary Password :</td>
                    <td><input type="password" name="conpass" placeholder="Re-Enter to Confirm"></td>
                </tr>
            </table>
        </fieldset>
        <br>
        <table>
            <tr>
                <td><input type="submit" value="Confirm"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </table>
    </form>
</body>

</html>