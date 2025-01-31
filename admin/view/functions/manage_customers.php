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
            <td><a href="../layout/dashboard.php">Dashboard</a></td>
            <td><a href="../layout/messages.php">Messages</a></td>
            <td><a href="../layout/update_profile.php">Account</a></td>
            <td><a href="../layout/contact_admin.php">Contact Admin</a></td>
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
                    <div class="table-cell action-col">Actions</div>
                </div>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <form method="post">
                        <div class="table-row">
                            <div class="table-cell id-col"><?php echo $row["customer_id"]; ?></div>
                            <div class="table-cell name-col"><input type="text" name="name" value="<?php echo $row["name"]; ?>"></div>
                            <div class="table-cell email-col"><?php echo $row["email"]; ?></div>
                            <div class="table-cell password-col"><input type="text" name="password" value="<?php echo $row["password"]; ?>"></div>
                            <div class="table-cell address-col"><input type="text" name="address" value="<?php echo $row["address"]; ?>"></div>
                            <div class="table-cell phone-col"><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"></div>
                            <div class="table-cell action-col">
                                <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                                <input type="submit" name="edit" value="Edit" class="edit-btn">
                                <input type="submit" name="delete" value="Delete" class="delete-btn">
                            </div>
                        </div>
                    </form>
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
