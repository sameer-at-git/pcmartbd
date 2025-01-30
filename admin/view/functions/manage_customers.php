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
if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    if ($db->updateCustomer($conn, $name, $email, $password, $address, $phone)) {
        echo "Customer information updated successfully!";
    } else {
        echo "Error updating customer: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $email = $_POST['email'];
    
    if ($db->deleteCustomer($conn, $email)) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Customers</title>
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
<h2>Manage Customers</h2>

    <?php
    $result = $db->getAllCustomers($conn);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th class="id-column">ID</th>
                <th>Name</th>
                <th class="email-column">Email</th>
                <th>Password</th>
                <th>Address</th>
                <th class="phone-column">Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post">
                    <tr>
                        <td><?php echo $row["customer_id"]; ?></td>
                        <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><input type="text" name="password" value="<?php echo $row["password"]; ?>"></td>
                        <td><input type="text" name="address" value="<?php echo $row["address"]; ?>"></td>
                        <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"></td>
                        <td>
                            <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
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
