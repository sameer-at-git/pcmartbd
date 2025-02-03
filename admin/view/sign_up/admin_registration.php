<?php
session_start();

if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/view/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['admin_id'];
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <link rel="stylesheet" href="../../css/regstyle.css">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body> <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                PCMartBD
            </a>
        </div>
        <div class="admin-info">
            <a href="profile.php" class="admin-link">
                <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
                <div class="admin-name"><?php echo $userInfo['name']; ?></div>
            </a>
        </div>
    </div>

    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="../layout/home.php" class="active">Home</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/broadcast.php">Broadcast</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
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
                    <input type="text" name="email" id="email" placeholder="abcd@aiub.edu">
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
                
                <button type="submit">Confirm</button>
                <button type="button" onclick="confirmationBox()">Clear</button>
            </div>

    </div>
    </form>


    </div>
    <div class="footer">
        &copy; 2024 PCMartBD. All rights reserved.
    </div>
    <script src="../../js/admreg_validation.js"></script>

</body>

</html>