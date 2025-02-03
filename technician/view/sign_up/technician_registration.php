<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Registration</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/reg_validation.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">PCMartBD</a>
        </div>
    </div>


    <div class="main">
        <div class="content">
            <div class="page-header">
                <h2>Technician Registration</h2>
            </div>
            <form action="../../control/reg_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="profile-container">
                    <div class="profile-card">
                        <div class="profile-info-reg">
                            <h3><img src="../../images/icons/user-solid.svg" alt="Personal Icon" class="icon">
                                Personal Details</h3>
                            <div class="form-group-reg">
                                <label for="fname">First Name:</label>
                                <input type="text" id="fname" name="fname" placeholder="Enter Your First Name" onblur="return validateFirstName()">
                                <p id="fnameerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="lname">Last Name:</label>
                                <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name" onblur="return validateLastName()">
                                <p id="lnameerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="fathersname">Father's Name:</label>
                                <input type="text" id="fathersname" name="fathersname" placeholder="Enter Your Father's Name" onblur="return validateFathersName()">
                                <p id="fathersnameerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" id="dob" name="dob" onblur="return validateDOB()">
                                <p id="doberr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label>Gender:</label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Male"> Male
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Female"> Female
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Others"> Others
                                    </label>
                                    <p id="gendererr" class="error-message"></p>
                                </div>
                            </div>
                            <div class="form-group-reg">
                                <label for="phone">Phone:</label>
                                <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number">
                                <p id="phoneerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="address">Address:</label>
                                <textarea id="address" name="address" cols="30" rows="4" placeholder="Enter Your Address"></textarea>
                                <p id="addresserr" class="error-message"></p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-info-reg">
                            <h3><img src="../../images/icons/briefcase-solid.svg" alt="Work Icon" class="icon">
                                Work Details</h3>
                            <div class="form-group-reg">
                                <label for="experience">Experience:</label>
                                <textarea id="experience" name="experience" rows="4" cols="20" placeholder="Write a brief description of your experience if you have any" 
                                onblur="return validateExperience()"></textarea>
                                <p id="experienceerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="workarea">Preferred Work Area:</label>
                                <select id="workarea" name="workarea">
                                    <option value="">Select Your Preferred Work Area</option>
                                    <option value="Mirpur">Mirpur</option>
                                    <option value="Uttara">Uttara</option>
                                    <option value="Bashundhara">Bashundhara</option>
                                    <option value="Dhanmondi">Dhanmondi</option>
                                </select>
                                <p id="workareaerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="workhour">Preferred Work Hours:</label>
                                <select id="workhour" name="workhour" size="3">
                                    <option value="">Select Your Preferred Work Hour</option>
                                    <option value="Slot-1">Slot 1 - 7.00 AM to 12:00 PM</option>
                                    <option value="Slot-2">Slot 2 - 12:00 PM to 5:00 PM</option>
                                    <option value="Slot-3">Slot 3 - 5:00 PM to 11:00 PM</option>
                                    <option value="Slot-4">Slot 4 - 11:00 PM to 7:00 AM</option>
                                </select>
                                <p id="workhourerr" class="error-message"></p>
                            </div>
                        </div>
                    </div>


                    <div class="profile-card">
                        <div class="profile-info-reg">
                            <h3><img src="../../images/icons/clipboard-check-solid.svg" alt="Work Icon" class="icon">
                                Verifications</h3>
                            <div class="form-group-reg">
                                <label for="nid">NID Photo:</label>
                                <input type="file" id="nid" name="nid">
                            </div>
                            <div class="form-group-reg">
                                <label for="photo">Photo:</label>
                                <input type="file" id="photo" name="photo">
                            </div>
                            <div class="form-group-reg">
                                <label for="cv">CV:</label>
                                <input type="file" id="cv" name="cv">
                            </div>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-info-reg">
                            <h3><img src="../../images/icons/id-card-regular.svg" alt="Account Icon" class="icon">
                                Account Details</h3>
                            <div class="form-group-reg">
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" placeholder="abcd@example.com" onkeyup="return validateEmail()">
                                <p id="emailerr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="Enter Your Password" onkeyup="return validatePassword()">
                                <p id="passworderr" class="error-message"></p>
                            </div>
                            <div class="form-group-reg">
                                <label for="confirmpass">Confirm Password:</label>
                                <input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm Your Password" onkeyup="return validateConfirmPassword()">
                                <p id="confirmpasserr" class="error-message"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" class="submit-button" value="Confirm Registration">
                        <input type="reset" class="reset-button" value="Clear">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>

</body>

</html>