<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Registration</title>
    <link rel="stylesheet" href="../../css/technicianRegStyle.css">
</head>

<body>
    <script src="../../javascript/script.js"></script>
    <form action="../../control/reg_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="nav">
            <h1>Technician Registration Page</h1>
        </div>

        <fieldset class="personalField">
            <legend>Personal Details</legend>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="Enter Your First Name">
                <div class="nameerr" id="nameerr"></div>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name">
            </div>
            <div class="form-group">
                <label for="fathersname">Father's Name:</label>
                <input type="text" id="fathersname" name="fathersname" placeholder="Enter Your Father's Name">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" id="phone" name="phone" placeholder="Enter Your Phone Number">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" cols="30" rows="4" placeholder="Enter Your Address"></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Work Details</legend>
            <div class="form-group">
                <label for="experience">Experience:</label>
                <textarea id="experience" name="experience" rows="4" cols="20" placeholder="Write a brief description of your experience if you have any"></textarea>
                <p id="experienceerr"></p>
            </div>
            <div class="form-group">
                <label for="workarea">Preferred Work Area:</label>
                <select id="workarea" name="workarea">
                    <option value="">Select Your Preferred Work Area</option>
                    <option value="Mirpur">Mirpur</option>
                    <option value="Uttara">Uttara</option>
                    <option value="Bashundhara">Bashundhara</option>
                    <option value="Dhanmondi">Dhanmondi</option>
                </select>
                <p id="workareaerr"></p>
            </div>
            <div class="form-group">
                <label for="workhour">Preferred Work Hours:</label>
                <select id="workhour" name="workhour" size="3">
                    <option value="">Select Your Preferred Work Hour</option>
                    <option value="Slot-1">Slot 1 - 7.00 AM to 12:00 PM</option>
                    <option value="Slot-2">Slot 2 - 12:00 PM to 5:00 PM</option>
                    <option value="Slot-3">Slot 3 - 5:00 PM to 11:00 PM</option>
                    <option value="Slot-4">Slot 4 - 11:00 PM to 7:00 AM</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend>Verifications</legend>
            <div class="form-group">
                <label for="nid">NID Photo:</label>
                <input type="file" id="nid" name="nid">
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="cv">CV:</label>
                <input type="file" id="cv" name="cv">
            </div>
        </fieldset>

        <fieldset>
            <legend>Login Details</legend>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="abcd@example.com">
                <p id="emailerr"></p>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password">
                <div class="passerr" id="passerr"></div>
            </div>
            <div class="form-group">
                <label for="confirmpass">Confirm Password:</label>
                <input type="password" id="confirmpass" name="confirmpass" placeholder="Enter Your Password">
                <div class="conpasserr" id="conpasserr"></div>
            </div>
        </fieldset>

        <div class="form-actions">
            <input type="submit" value="Confirm Registration">
            <input type="reset" value="Clear">
        </div>
    </form>
</body>

</html>