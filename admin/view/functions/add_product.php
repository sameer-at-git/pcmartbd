<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$result = $db->getAllAppointments($conn);
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
    <link rel="stylesheet" href="../../css/index.css">

</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
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
                    <td><a href="../layout/dashboard.php">Dashboard</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/update_profile.php">Account</a></td>
                    <td><a href="../layout/contact_admin.php">Contact Admin</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
       

        $db->closeCon($conn);
        ?>
</body>
</html>