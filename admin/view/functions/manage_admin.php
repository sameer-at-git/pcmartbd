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
    $doj = $_POST['doj'];
    $presentaddress = $_POST['presentaddress'];
    $permanentaddress = $_POST['permanentaddress'];

    $sql = "UPDATE admin SET 
                name = '$name', 
                access = '$access', 
                number = '$number', 
                bio = '$bio', 
                doj = '$doj',  
                presentaddress = '$presentaddress',  
                permanentaddress = '$permanentaddress'
            WHERE admin_id = $admin_id";

    if ($conn->query($sql) === TRUE) {
        echo "Admin information updated successfully!";
    } else {
        echo "Error updating technician: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $admin_id = $_POST['admin_id'];

    $sql = "DELETE FROM admin WHERE admin_id = $admin_id";

    if ($conn->query($sql) === TRUE) {
        echo "Admin deleted successfully!";
    } else {
        echo "Error deleting technician: " . $conn->error;
    }
}
if (isset($_POST['editnid'])) {
    $admin_id = $_POST['admin_id'];

}
if (isset($_POST['editpic'])) {
    $admin_id = $_POST['admin_id'];

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Admins</title>
</head>

<body>

    <h2>Manage Admins</h2>

    <?php
    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Access</th>
                <th>Number </th>
                <th>Bio</th>
                <th>Data of Joining</th>
                <th>Present Address</th>
                <th>Permanent Address</th>
                <th>NID </th>
                <th>Change NID </th>
                <th>Profile Pic</th>
                <th>Change Pic</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post">
                    <tr>
                        <td><?php echo $row["admin_id"]; ?></td>
                        <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"> </td>
                        <td><input type="text" name="access" value="<?php echo $row["access"]; ?>"></td>
                        <td><input type="text" name="number" value="<?php echo $row["number"]; ?>"></td>
                        <td><input type="text" name="bio" value="<?php echo $row["bio"]; ?>"></td>
                        <td><input type="text" name="doj" value="<?php echo $row["doj"]; ?>"></td>
                        <td><input type="text" name="presentaddress" value="<?php echo $row["presentaddress"]; ?>"></td>
                        <td><input type="text" name="permanentaddress" value="<?php echo $row["permanentaddress"]; ?>"></td>
                        <td><?php echo '<img src="../' . $row['nidpic'] . '" width="100">'; ?></td>
                        <td><input type="file" name="editnid" value="Change NID"></td>
                        <td><?php echo '<img src="../' . $row['propic'] . '" width="100">'; ?></td>
                        <td><input type="file" name="editpic" value="Change Photo"></td>
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