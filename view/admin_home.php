<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
include('../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['user_id'];
$admin_type = $_SESSION['user_access'];
?>
<html>

<head>
    <title>Admin Home</title>
</head>

<body>
    <nav>
        <table>
            <tr>
                <td><a href="home.php">Home</a></td>
                <td><a href="notifications.php">Notifications</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
    </nav>
    -------------------------------------------------------------------------------------------------------------
    <br>
    <fieldset>
        
            <section id="currentstat">
                <h2>Current Stat</h2>
        
        <ol>
            <li>Total Admins: <?php echo $db->getTotalCount('admin', $conn); ?></li>
            <li>Total Employees: <?php echo $db->getTotalCount('employee', $conn); ?></li>
            <li>Total Technicians: <?php echo $db->getTotalCount('technician', $conn); ?></li>
            <li>Total Customers: <?php echo $db->getTotalCount('customer', $conn); ?></li>
            <li>Total Products: <?php echo $db->getTotalCount('product', $conn); ?></li>
            <li>Total Orders: <?php echo $db->getTotalCount("orders", $conn); ?></li>
            <li>Total Revenue: <?php echo $db->getTotalRevenue($conn); ?></li>
        </ol>
    </fieldset>
    </section>
    </fieldset>
    <legend>
        <h2>Admin Functionalities</h2>
    </legend>
    <section id="functionalities">
        <section id="manage_technician">
            <h3><a href="functions/manage_technician.php">Manage Technician</a> </h3>
        </section>
        <?php
        if ($admin_type === 'Full Control' || $admin_type === 'Employee Control') {
            echo '<section id="manage-employees">
        <h3><a href="functions/manage_employee.php">Manage Employees</a> </h3>
        </section>';
        }
        if ($admin_type === 'Full Control' || $admin_type === 'Product Control') {
            echo '<section id="manage-product">
        <h3><a href="functions/manage_products.php">Manage Product</a> </h3>
        </section>';
        }

        if ($admin_type === 'Full Control') {
            echo '<section id="manage-admin">
        <h3><a href="functions/manage_admin.php">Manage Admin</a> </h3>
        </section>';
        }
        ?>

    </section>
    </fieldset>
</body>

</html>