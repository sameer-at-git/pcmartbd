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
    $technicianData = array(
        'technician_id' => $_POST['technician_id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'father_name' => $_POST['father_name'],
        'gender' => $_POST['gender'],
        'dob' => $_POST['dob'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'experience' => $_POST['experience'],
        'work_area' => $_POST['work_area'],
        'work_hour' => $_POST['work_hour'],
        'nidpic' => $_POST['nidpic'],
        'photo' => $_POST['photo'],
        'cv' => $_POST['cv'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    );

    if ($db->updateTechnician($conn, $technicianData)) {
        echo "Technician information updated successfully!";
    } else {
        echo "Error updating technician: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $technician_id = $_POST['technician_id'];
    
    if ($db->deleteTechnician($conn, $technician_id)) {
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
    <link rel="stylesheet" href="../../css/managestyle.css">
    
</head>

<body>
    <a href="../admin_home.php" class="back-button">← Back to Dashboard</a>
    <h2>Manage Technicians</h2>

    <?php
    $result = $db->getAllTechnicians($conn);

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
                        <td><input type="text" name="first_name" value="<?php echo $row["first_name"]; ?>"> <input type="text" name="last_name" value="<?php echo $row["last_name"]; ?>"></td>
                        <td><input type="text" name="work_hour" value="<?php echo $row["work_hour"]; ?>"></td>
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