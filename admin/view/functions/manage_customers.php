<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$uid=$_SESSION['user_id'];

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
    
    if ($db->deleteCustomer($conn, $customer_id,$uid)) {
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
    <a href="../layout/home.php" class="back-button">← Back to Home</a>
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

    $db->closeCon($conn);
    ?>

</body>
</html>
