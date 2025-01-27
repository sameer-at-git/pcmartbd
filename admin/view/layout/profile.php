<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$uid = $_SESSION['user_id'];
$userInfo = $db->getUserInfo($conn, $aid);
if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $bio = $_POST['bio'];
    $dob = $_POST['dob'];
    $preadd = $_POST['presentaddress'];
    $peradd = $_POST['permanentaddress'];
    $password = $_POST['password'];

    $db->updateUserInfo($conn, $aid, $name, $number, $bio, $dob,  $preadd, $peradd, $password,$uid);
    $userInfo = $db->getUserInfo($conn, $aid);
}


if (isset($_POST['back'])) {
    header('Location: home.php');
    exit();
}
if (isset($_POST['delete'])) {
    $db->deleteAdmin($conn, $aid,$uid);
    header('Location: ../../../layout/login.php');
    exit();
}
if (isset($_POST['editnid'])) {
    //$db->ChangePic($conn, $aid);
    exit();
}
if (isset($_POST['editpic'])) {
    //$db->ChangePic($conn, $aid);
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../../css/home.css">

</head>

<body>
<div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="dashboard.php">Dashboard</a></td>
                    <td><a href="notifications.php">Notifications</a></td>
                    <td><a href="profile.php" class="active">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content">
        <div class="content-section">
            <h2>Admin Information</h2>
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend><b>Personal Information</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>Full Name :</td>
                                    <td><input type="text" name="name" value="<?php echo $userInfo['name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Gender :</td>
                                    <td><?php echo $userInfo['gender']; ?> </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone Number :</td>
                                    <td><input type="text" name="number" value="<?php echo $userInfo['number']; ?>"></td>
                                    <td>National ID :</td>
                                    <td><?php echo '<img src="' . $userInfo['nidpic'] . '" width="100">';  ?></td>
                                    <td><input type="submit" name="editnid" value="Change Photo"></td>

                                </tr>
                                <tr>
                                    <td>Present Address :</td>
                                    <td><textarea name="presentaddress"><?php echo $userInfo['presentaddress']; ?></textarea></td>
                                    <td>Photo :</td>
                                    <td><?php echo '<img src="' . $userInfo['propic'] . '" width="100">'; ?></td>
                                    <td><input type="submit" name="editpic" value="Change Photo"></td>

                                </tr>
                                <tr>
                                    <td>Permanent Address :</td>
                                    <td><textarea name="permanentaddress"><?php echo $userInfo['permanentaddress']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth :</td>
                                    <td><input type="date" name="dob" value="<?php echo $userInfo['dob']; ?>"></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><b>Joining Information</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>Date of Joining :</td>
                                    <td><?php echo $userInfo['doj']; ?></td>
                                </tr>
                                <tr>
                                    <td>Bio/Link :</td>
                                    <td><textarea name="bio"><?php echo $userInfo['bio']; ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><b>Admin Access Information</b></legend>
                        <div>
                            <table>
                                <tr>
                                    <td>Access Type :</td>
                                    <td><?php echo $userInfo['access']; ?></td>
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
                                    <td><input type="password" name="password" value="<?php echo $userInfo['password']; ?>"></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                    <br>
                    <div>
                        <table>
                            <tr>
                                <td><input type="submit" name="back" value="Back"></td>
                                <td><input type="submit" name="edit" value="Edit"></td>
                                <td><input type="submit" name="delete" value="Delete"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>
<?php
$db->closecon($conn);
?>