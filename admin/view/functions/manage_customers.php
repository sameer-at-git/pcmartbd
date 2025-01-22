<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['edit'])) {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    if ($db->updateCustomer($conn, $customer_id, $name, $email, $password, $address, $phone)) {
        echo "Customer information updated successfully!";
    } else {
        echo "Error updating customer: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $customer_id = $_POST['customer_id'];
    
    if ($db->deleteCustomer($conn, $customer_id)) {
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
</head>
<body>
    <a href="../admin_home.php" class="back-button">← Back to Dashboard</a>
    <h2>Manage Customers</h2>

    <?php
    $result = $db->getAllCustomers($conn);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post">
                    <tr>
                        <td><?php echo $row["customer_id"]; ?></td>
                        <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                        <td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
                        <td><input type="text" name="password" value="<?php echo $row["password"]; ?>"></td>
                        <td><input type="text" name="address" value="<?php echo $row["address"]; ?>"></td>
                        <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"></td>
                        <td>
                            <input type="hidden" name="customer_id" value="<?php echo $row["customer_id"]; ?>">
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

    $conn->close();
    ?>

</body>
</html>
