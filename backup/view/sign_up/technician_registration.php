<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Registration</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <form action="../../control/reg_control.php" method="POST" enctype="multipart/form-data">
        <div class="nav"> <h1>Technician Registration Page</h1> </div>
        <fieldset class="personalField">
            <legend>Personal Details</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="fname" placeholder="Enter Your First Name"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lname" placeholder="Enter Your Last Name"></td>
                </tr>
                <tr>
                    <td>Father's Name:</td>
                    <td><input type="text" name="fathersname" placeholder="Enter Your Father's Name"></td>
                </tr>
                <!--
                <tr>
                    <td>Gender</td>
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
                </tr> -->
                <tr>
                    <td>
                        Date of Birth:
                    </td>
                    <td>
                        <input type="date" id="dob" name="dob"> 
                    </td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="number" name="phone" placeholder="Enter Your phone Number"> </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="address" id="" cols="30" rows="4" placeholder="Enter Your Address"></textarea> 
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Work Details</legend>
            <table>
                <tr>
                    <td>
                        Experience:
                    </td>
                    <td><textarea name="experience" rows="4" cols="20"
                            placeholder="Write a brief description of your experience if you have any"></textarea></td>
                </tr>
                <tr>
                    <td>
                        Preferred Work Area:
                    </td>
                    <td><select name="workarea">
                            <option value="">Select Your Preferred Work Area</option>
                            <option value="Mirpur">Mirpur</option>
                            <option value="Uttara">Uttara</option>
                            <option value="Bashundhara">Bashundhara</option>
                            <option value="Dhanmondi">Dhanmondi</option>
                        </select> </td>
                </tr>
                <tr>
                    <td>
                        Preferred Work Hours:
                    </td>
                    <td><select name="workhour" size="3">
                            <option value="">Select Your Preferred Work Hour</option>
                            <option value="Slot-1">Slot 1 - 7.00 AM to 12:00 PM</option>
                            <option value="Slot-2">Slot 2 - 12:00 PM to 5:00 PM</option>
                            <option value="Slot-3">Slot 3 - 5:00 PM to 11:00 PM</option>
                            <option value="Slot-4">Slot 4 - 11:00 PM to 7:00 AM</option>
                        </select> </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>
                Verifications
            </legend>
            <table>
                <tr>
                    <td>
                        NID Photo:
                    </td>
                    <td>
                        <input type="file" name="nid"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Photo:
                    </td>
                    <td>
                        <input type="file" name="photo"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        CV:
                    </td>
                    <td>
                        <input type="file" name="cv"> 
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Login Details</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="abcd@example.com"> </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Ener Your Password"> </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirmpass" placeholder="Enter Your Password"> </td>
                </tr>
            </table>
        </fieldset>
        <table id="btn">
            <tr>
                <td><input type="submit" value="Confirm Registration"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </table>
    </form>
</body>

</html>