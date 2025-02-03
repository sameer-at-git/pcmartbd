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
$userInfo = $db->getUserInfo($conn, $aid);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Customers</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/managestyle.css">
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
    <table>
        <tr>
            <td><a href="../layout/home.php" class="active">Home</a></td>
            <td><a href="../layout/messages.php">Messages</a></td>
            <td><a href="../layout/broadcast.php" >Broadcast</a></td>
            <td><a href="../layout/contact_user.php">Contact User</a></td>
            <td><a href="../../control/sessionout.php">Logout</a></td>
        </tr>
    </table>
</div>

<div class="manage-container">
    <div class="manage-header">
        <p class="manage-title">Manage Customers</p>
    </div>
    <div class="table-wrapper">
        <?php
        $result = $db->getAllCustomers($conn);

        if ($result->num_rows > 0) {
        ?>
            <div class="customer-table">
                <div class="table-row table-header">
                    <div class="table-cell id-col">ID</div>
                    <div class="table-cell name-col">Name</div>
                    <div class="table-cell email-col">Email</div>
                    <div class="table-cell password-col">Password</div>
                    <div class="table-cell address-col">Address</div>
                    <div class="table-cell phone-col">Phone</div>
                </div>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="table-row">
                        <div class="table-cell id-col"><?php echo $row["customer_id"]; ?></div>
                        <div class="table-cell name-col"><?php echo $row["name"]; ?></div>
                        <div class="table-cell email-col"><?php echo $row["email"]; ?></div>
                        <div class="table-cell password-col"><?php echo $row["password"]; ?></div>
                        <div class="table-cell address-col"><?php echo $row["address"]; ?></div>
                        <div class="table-cell phone-col"><?php echo $row["phone"]; ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo "<p class='no-results'>No customers found.</p>";
        }

        $db->closeCon($conn);
        ?>
    </div>
</div>

</body>
</html>
