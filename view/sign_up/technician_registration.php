
<html >

<head> <title>Technician Registration</title>
</head>

<body>
    <form action="../../control/technician_reg_control.php" method="POST">
        <h1>Technician Registration Page</h1>
        <fieldset>
            <legend>Personal Details</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="tecfirstname" placeholder="Enter Your First Name" required> *</td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="teclastname" placeholder="Enter Your Last Name"> *</td>
                </tr>
                <tr>
                    <td>Father's Name:</td>
                    <td><input type="text" name="tecfatname" placeholder="Enter Your Father's Name"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <label for="101">
                            <input type="radio" name="tecgender" value="Male" id="101">Male
                        </label>
                        <label for="102">
                            <input type="radio" name="tecgender" value="Female" id="102">Female
                        </label>
                        <label for="103">
                            <input type="radio" name="tecgender" value="Others" id="103">Others
                        </label> *
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Birth:
                    </td>
                    <td>
                        <input type="date" id="dob" name="tecdob" required> *
                    </td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="number" name="tecnum" placeholder="Enter Your phone Number" required> *</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="tecaddress" id="" cols="30" rows="4" placeholder="Enter Your Address"></textarea> *
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
                    <td><input type="checkbox" name="workarea" value="Mirpur">Mirpur
                        <input type="checkbox" name="workarea" value="Uttora">Uttora
                        <input type="checkbox" name="workarea" value="Kuril">Kuril
                        <input type="checkbox" name="workarea" value="Bashundhara">Bashundhara
                        <input type="checkbox" name="workarea" value="Khilgaon">Khilgaon
                        <input type="checkbox" name="workarea" value="Tejgaon">Tejgaon
                        <input type="checkbox" name="workarea" value="Dhanmondi">Dhanmondi
                        <input type="checkbox" name="workarea" value="Badda">Badda
                        <input type="checkbox" name="workarea" value="Savar">Savar
                        <input type="checkbox" name="workarea" value="Mohammadpur">Mohammadpur *
                    </td>
                </tr>
                <tr>
                    <td>
                        Preferred Work Hours:
                    </td>
                    <td><select name="workhour" size="3">
                            <option value="" required>Select Your Preferred Work Hour</option>
                            <option value="Slot-1">Slot 1 - 7.00 AM to 12:00 PM</option>
                            <option value="Slot-2">Slot 2 - 12:00 PM to 5:00 PM</option>
                            <option value="Slot-3">Slot 3 - 5:00 PM to 11:00 PM</option>
                            <option value="Slot-4">Slot 4 - 11:00 PM to 7:00 AM</option>
                        </select> *</td>
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
                        <input type="file" name="NIDPhoto"> *
                    </td>
                </tr>
                <tr>
                    <td>
                        Photo:
                    </td>
                    <td>
                        <input type="file" name="Photo"> *
                    </td>
                </tr>
                <tr>
                    <td>
                        CV:
                    </td>
                    <td>
                        <input type="file" name="CV"> *
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Login Details</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="tecemail" placeholder="abcd@example.com" required> *</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password"  name="tecpass" placeholder="Ener Your Password" required> *</td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password"  name="contecpass" placeholder="Enter Your Password" required> *</td>
                </tr>
            </table>
        </fieldset>
        <table>
            <tr>
                <td><input type="submit" value="Confirm Registration"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </table>
    </form>
</body>

</html>