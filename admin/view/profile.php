<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$userInfo = $db->getUserInfo($conn, $_SESSION['admin_id']);
$id = $_SESSION['user_id'];
if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $bio = $_POST['bio'];
    $dob = $_POST['dob'];
    $preadd = $_POST['presentaddress'];
    $peradd = $_POST['permanentaddress'];
    $password = $_POST['password'];

    $db->updateUserInfo($conn, $id, $name, $number, $bio, $dob,  $preadd, $peradd, $password);
    $userInfo = $db->getUserInfo($conn, $id);
}


if (isset($_POST['back'])) {
    header('Location: admin_home.php');
    exit();
}
if (isset($_POST['delete'])) {
    $db->deleteUserById($conn, $id);
    header('Location: login.php');
    exit();
}
if (isset($_POST['editnid'])) {
    $db->ChangePic($conn, $id);
    exit();
}
if (isset($_POST['editpic'])) {
    $db->ChangePic($conn, $id);
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../css/pagestyle.css">

</head>

<body>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td> <a href="admin_home.php">Dashboard</a></td>
                    <td><a href="notifications.php">Notifications</a></td>
                    <td> <a href="profile.php">Profile</a></td>
                    <td><a href="logout.php">Logout</a></td>
            </table>
        </div>
    </div>
    <div>
        <h2>Admin information</h2>
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
</body>

</html>
<?php
$db->closecon($conn);
?>