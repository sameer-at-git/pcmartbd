<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['edit'])) {
    $admin_id = $_POST['admin_id'];
    $name = $_POST['name'];
    $access = $_POST['access'];
    $number = $_POST['number'];
    $bio = $_POST['bio'];
    $presentaddress = $_POST['presentaddress'];
    $permanentaddress = $_POST['permanentaddress'];

    if ($db->updateAdmin($conn, $admin_id, $name, $access, $number, $bio, $presentaddress, $permanentaddress)) {
        echo "Admin information updated successfully!";
    } else {
        echo "Error updating admin: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $admin_id = $_POST['admin_id'];
    
    if ($db->deleteAdmin($conn, $admin_id)) {
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
    
</head>

<body>
    <a href="../admin_home.php" class="back-button">← Back to Dashboard</a>
    <h2>Manage Admins</h2>

    <?php
    $result = $db->getAllAdmins($conn);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Access</th>
                <th>Number</th>
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