<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$uid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
</head>

<body>
    <a href="../layout/home.php" class="back-button">← Back to Home</a>
    <h2>All Appointments</h2>

    <?php
    $result = $db->getAllAppointments($conn);

    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Appointment ID</th>
                <th>Customer Name</th>
                <th>Service Type</th>
                <th>Technician Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Notes</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["appointment_id"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["service_type"]; ?></td>
                    <td><?php echo $row["technician_name"]; ?></td>
                    <td><?php echo $row["appointment_date"]; ?></td>
                    <td><?php echo $row["appointment_time"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["notes"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        echo "No appointments found";
    }

    $db->closeCon($conn);
    ?>

</body>
</html>
