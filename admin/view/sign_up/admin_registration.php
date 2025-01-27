<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <link rel="stylesheet" href="../../css/regstyle.css">
</head>

<body>
    <div class="form-container">
        <h2>Add Admin</h2>
        <form id="adminForm" action="../../control/admin_reg_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">

            <div class="section">
                <h3>Personal Information</h3>

                <div class="input-group">
                    <label for="uname">Full Name:</label>
                    <input type="text" name="uname" id="uname" placeholder="Enter Full Name">
                    <p id="nameerr"></p>
                </div>

                <div class="input-group">
                    <label>Gender:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Male"> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                        <p id="gendererr"></p>
                    </div>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter Phone Number">
                    <p id="phoneerr"></p>
                </div>

                <div class="input-group">
                    <label for="nid">National ID:</label>
                    <input type="file" name="nid" id="nid">
                </div>

                <div class="input-group">
                    <label for="preadd">Present Address:</label>
                    <textarea name="preadd" id="preadd" cols="30" rows="4" placeholder="Enter Your Present Address"></textarea>
                </div>



                <div class="input-group">
                    <label for="peradd">Permanent Address:</label>
                    <textarea name="peradd" id="peradd" cols="30" rows="4" placeholder="Enter Your Permanent Address"></textarea>
                </div>
                <div class="input-group">
                    <label for="pic">Photo:</label>
                    <input type="file" name="pic" id="pic">
                </div>

                <div class="input-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob">
                </div>
            </div>


            <div class="section">
                <h3>Joining Information</h3>

                <div class="input-group">
                    <label for="doj">Date of Joining:</label>
                    <input type="date" name="doj" id="doj">
                </div>

                <div class="input-group">
                    <label for="bio">Bio/Link:</label>
                    <input type="text" name="bio" id="bio" placeholder="Enter Portfolio or Github Link">
                </div>
            </div>


            <div class="section">
                <h3>Admin Access Information</h3>

                <div class="input-group">
                    <label for="permit">Select Permissions:</label>
                    <select name="permit" id="permit">
                        <option value="0">Select Permission</option>
                        <option value="Full Control">Full Control</option>
                        <option value="Product Control">Product Control</option>
                        <option value="Employee Control">Employee Control</option>
                    </select>
                    <p id="permiterr"></p>
                </div>

            </div>


            <div class="section">
                <h3>Login Details</h3>

                <div class="input-group">
                    <div class="label-container">
                        <label for="email" id="emailLabel" onmouseover="showEmailMessage()" onmouseout="hideEmailMessage()">Email:</label>
                        <div id="emailMessage"></div>
                    </div>
                    <input type="email" name="email" id="email" placeholder="abcd@aiub.edu">
                    <p id="emailerr"></p>
                </div>

                <div class="input-group">
                    <label for="pass">Temporary Password:</label>
                    <input type="password" name="pass" id="pass" placeholder="Enter Your Password">
                    <p id="passerr"></p>
                </div>

                <div class="input-group">
                    <label for="conpass">Confirm Temporary Password:</label>
                    <input type="password" name="conpass" id="conpass" placeholder="Re-Enter to Confirm">
                    <p id="conpasserr"></p>
                </div>
            </div>


            <div class="button-group">
                <a id="back-button" href="../functions/manage_admin.php">Back</a>
                <button type="submit">Confirm</button>
                <button type="button" onclick="confirmationBox()">Clear</button>
            </div>

    </div>
    </form>


    </div>
    <script src="../../js/reg_validation.js"></script>

</body>

</html>