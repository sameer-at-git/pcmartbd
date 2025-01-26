<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>

<body>
    <h2>Employee Registration</h2>
    <form action="../../control/employee_reg_control.php" method="post">
        <fieldset>
            <legend><b>Employee Personal Details</b></legend>
            <table>
                <tr>
                    <td>First Name :</td>
                    <td><input type="text" name="fname" placeholder="Enter Your First Name" ></td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><input type="text" placeholder="Enter Your Last Name"></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="number" name="number"></td>
                </tr>
                <tr>
                    <td>Date of Birth :</td>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <td>Present Address :</td>
                    <td><textarea name="adress" id="" cols="30" rows="4"
                            placeholder="Enter Your Present Address"></textarea></td>
                </tr>
                <tr>
                    <td>Permanent Address :</td>
                    <td><textarea name="adress" id="" cols="30" rows="4"
                            placeholder="Enter Your Permanent Address"></textarea></td>
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
                    <td>Maritial Status :</td>
                    <td>
                        <select name="status" id="maritial">
                            <option value="married">Married</option>
                            <option value="unmarried">Un-Married</option>
                            <option value="divorced">Divorced</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
        <br>
        <fieldset>
            <legend><b>Joining Information</b></legend>
            <table>
                <tr>
                    <td>Picture of Your National ID :</td>
                    <td><input type="file" name="nidpic"></td>
                </tr>
                <tr>
                    <td>Picture of Yourself :</td>
                    <td><input type="file" name="pic"></td>
                </tr>
                <tr>
                    <td>Date of Joining :</td>
                    <td><input type="date" name="doj"></td>
                </tr>
                <tr>
                    <td>Employment :</td>
                    <td>
                        <label for="101">
                            <input type="radio" name="employment" value="full" id="101">Full Time
                        </label>
                        <label for="102">
                            <input type="radio" name="employment" value="part" id="102">Part Time
                        </label>
                        <label for="103">
                            <input type="radio" name="employment" value="intern" id="103">Internship
                        </label>
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
                    <td><input type="email" placeholder="abcd@gmail.com"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="pass" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" placeholder="Re-Enter to Confirm"></td>
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