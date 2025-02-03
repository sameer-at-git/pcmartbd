<?php
session_start();
include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$user = $db->showUserByID($_SESSION['emp_id'],  $conn);

$userInfo = $user->fetch_assoc();

?>

<html>

<head>
    <title>Employee Home</title>
    <link rel="stylesheet" href="../../css/layout.css">
</head>

<body>
 <script src="../../js/updateProfile.js"></script>
    <div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="full_home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="full_home.php">Home</a></td>
                    <td><a href="product.php">Products</a></td>
                    <td><a href="reviews.php">Reviews</a></td>
                    <td><a href="profile.php" class="active">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="info">
        <div class="info-section">
            <h2>Your Information</h2>
            <div>
                <form action="../../control/employee_profile_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <fieldset>
                        <legend><b>Personal Information</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>First Name :</td>
                                    <td><input type="text" id="fname" name="fname" value="<?php echo $userInfo['f_name']; ?>"></td>
                                    </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="fname-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Last Name :</td>
                                    <td><input type="text" id="lname" name="lname" value="<?php echo $userInfo['l_name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="lname-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Photo :</td>
                                    <td><?php echo '<img src="../' . $userInfo['pic'] . '" width="300">'; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number :</td>
                                    <td><input type="text" id="phone" name="phone" value="<?php echo $userInfo['phone']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="phone-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Gender :</td>
                                    <td><?php echo $userInfo['gender']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth :</td>
                                    <td><input type="date" id="dob" name="dob" value="<?php echo $userInfo['dob']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="dob-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Present Address :</td>
                                    <td><input type="text" id="pre_add" name="pre_add" value="<?php echo $userInfo['pre_add']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="pre_add-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Permanent Address :</td>
                                    <td><input type="text" id="per_add" name="per_add" value="<?php echo $userInfo['per_add']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="per_add-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Marital Status :</td>
                                    <td><?php echo $userInfo['marital_status']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>National ID :</td>
                                    <td><?php echo '<img src="../' . $userInfo['nid'] . '" width="300">';  ?></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset>
                        <br>
                        <legend><b>Employment Information</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>Employment Status :</td>
                                    <td><?php echo $userInfo['employment']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Joining Date :</td>
                                    <td><?php echo $userInfo['joining_date']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><b>Login Details</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>Email :</td>
                                    <td><?php echo $userInfo['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Password :</td>
                                    <td><input type="password" id="password" name="password" value="<?php echo $userInfo['password']; ?>" onkeyup="validatePassword()"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="password-err"></p></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password :</td>
                                    <td><input type="password" id="cpassword" name="cpassword"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="error" id="cpassword-err"></p></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <br>
                    <div>
                        <table>
                            <tr>
                                <td><input type="submit" name="edit" value="Confirm Changes"></td>
                                <td><a href="profile.php" id="reset">Reset</a></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>

        </div>
</body>

</html>