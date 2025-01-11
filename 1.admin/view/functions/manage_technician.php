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
    $technician_id = $_POST['technician_id'];
    $experience = $_POST['experience'];
    $work_area = $_POST['work_area'];
    $work_hours = $_POST['work_hours'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE technician SET 
                experience = '$experience', 
                work_area = '$work_area', 
                work_hours = '$work_hours', 
                f_name = '$f_name', 
                l_name = '$l_name',  
                phone = '$phone',  
                email = '$email' 
            WHERE technician_id = $technician_id";

    if ($conn->query($sql) === TRUE) {
        echo "Technician information updated successfully!";
    } else {
        echo "Error updating technician: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $technician_id = $_POST['technician_id'];

    $sql = "DELETE FROM technician WHERE technician_id = $technician_id";

    if ($conn->query($sql) === TRUE) {
        echo "Technician deleted successfully!";
    } else {
        echo "Error deleting technician: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Technicians</title>
</head>

<body>

    <h2>Manage Technicians</h2>

    <?php
    $sql = "SELECT * FROM technician";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Technician ID</th>
                <th>Name</th>
                <th>Work Hours</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Work Area</th>
                <th>Experience</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post">
                    <tr>
                        <td><?php echo $row["technician_id"]; ?></td>
                        <td><input type="text" name="f_name" value="<?php echo $row["f_name"]; ?>"> <input type="text" name="l_name" value="<?php echo $row["l_name"]; ?>"></td>
                        <td><input type="text" name="work_hours" value="<?php echo $row["work_hours"]; ?>"></td>
                        <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"></td>
                        <td><input type="text" name="email" value="<?php echo $row["email"]; ?>"></td>
                        <td><input type="text" name="work_area" value="<?php echo $row["work_area"]; ?>"></td>
                        <td><input type="text" name="experience" value="<?php echo $row["experience"]; ?>"></td>
                        <td>
                            <input type="hidden" name="technician_id" value="<?php echo $row["technician_id"]; ?>">
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