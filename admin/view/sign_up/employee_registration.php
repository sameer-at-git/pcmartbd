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
    <title>Add Employee</title>
    <link rel="stylesheet" href="../../css/regstyle.css">
    <link rel="stylesheet" href="../../css/index.css">

</head>

<body><div class="header">
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
                    <td><a href="../layout/dashboard.php">Dashboard</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/update_profile.php">Account</a></td>
                    <td><a href="../layout/contact_admin.php">Contact Admins</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form-container">
    <h2>Add Employee</h2>
    <form action="../../control/employee_reg_control.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Employee Personal Details</b></legend>
            <table>
            <tr>
                    <td>First Name :</td>
                    <td><input type="text" name="fname" placeholder="Enter Your Full Name" ></td>
                </tr><tr>
                    <td>Last Name :</td>
                    <td><input type="text" name="lname" placeholder="Enter Your Full Name" ></td>
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
                    <td><textarea name="preadd" id="" cols="30" rows="4"
                            placeholder="Enter Your Present Address"></textarea></td>
                </tr>
                <tr>
                    <td>Permanent Address :</td>
                    <td><textarea name="peradd" id="" cols="30" rows="4"
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
                        
                    </td>
                </tr>
                <tr>
                    <td>Marital Status :</td>
                    <td>
                        <select name="status" id="maritial">
                            <option value="married">Married</option>
                            <option value="single">Single</option>
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
                            <input type="radio" name="employment" value="Full" id="101">Full Time
                        </label>
                        <label for="102">
                            <input type="radio" name="employment" value="Part" id="102">Part Time
                        </label>
                        <label for="103">
                            <input type="radio" name="employment" value="Intern" id="103">Internship
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
                    <td><input type="email" name="email" placeholder="abcd@gmail.com"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="pass" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" name="confirmpass" placeholder="Re-Enter to Confirm"></td>
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
    </div>
    <div class="footer">
        &copy; 2024 PCMartBD. All rights reserved.
    </div>
</body>

</html>