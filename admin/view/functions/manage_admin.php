<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);

if (isset($_POST['edit'])) {
    $admin_id = $_POST['admin_id'];
    $name = $_POST['name'];
    $access = $_POST['access'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];
    $presentaddress = $_POST['presentaddress'];
    $permanentaddress = $_POST['permanentaddress'];
    if ($db->updateProfile( $admin_id, $name,  $number, $bio, $presentaddress, $permanentaddress,$password,$access,$email,$conn)) {
        echo "Admin information updated successfully!";
    } else {
        echo "Error updating admin: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $email = $_POST['email'];

    if ($db->deleteAdmin($conn, $email)) {
        echo "Admin deleted successfully!";
    } else {
        echo "Error deleting admin: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Admins</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
    <link rel="stylesheet" href="../../css/index.css">

</head>

<body>
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="../layout/home.php" class="website-name"><p>PCMartBD</p></a>
    </div>
    <div class="admin-info">
        <a href="../layout/profile.php" class="admin-link">
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
                    <td><a href="../layout/dashboard.php" >Dashboard</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/update_profile.php">Account</a></td>
                    <td><a href="../layout/contact_admin.php" >Contact Admin</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
<h2>Manage Admins</h2>
    <a href="../sign_up/admin_registration.php" class="back-button">Add Admin</a>
    <?php
    $result = $db->getAllAdmins($conn);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th class="id-column">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Access</th>
                <th class="phone-column">Number</th>
                <th>Bio</th>
                <th>Present Address</th>
                <th>Permanent Address</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post">
                    <tr>
                        <td><?php echo $row["admin_id"]; ?></td>
                        <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <select name="access" class="access-dropdown">
                                <option value="Full Control" <?php echo ($row["access"] == "Full Control") ? "selected" : ""; ?>>Full Control</option>
                                <option value="Product Control" <?php echo ($row["access"] == "Product Control") ? "selected" : ""; ?>>Product Control</option>
                                <option value="Employee Control" <?php echo ($row["access"] == "Employee Control") ? "selected" : ""; ?>>Employee Control</option>
                            </select>
                        </td>
                        <td><input type="text" name="number" value="<?php echo $row["number"]; ?>"></td>
                        <td><input type="text" name="bio" value="<?php echo $row["bio"]; ?>"></td>
                        <td><input type="text" name="presentaddress" value="<?php echo $row["presentaddress"]; ?>"></td>
                        <td><input type="text" name="permanentaddress" value="<?php echo $row["permanentaddress"]; ?>"></td>
                        <td>
                            <input type="hidden" name="admin_id" value="<?php echo $row["admin_id"]; ?>">
                            <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                            <input type="hidden" name="password" value="<?php echo $row["password"]; ?>">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="delete" value="Delete">
                        </td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        echo "0 results";
    }

    $db->closeCon($conn);
    ?>

</body>

</html>