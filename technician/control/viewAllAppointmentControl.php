<?php
require '../../model/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../layout/view/login.php");
    exit();
}

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();

if(isset($_POST['search'])) {
    $result = $mydb->searchAppointments($conObj, $_POST['search'], $technician_id);
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['appointment_id']) . "</td>
                    <td>" . htmlspecialchars($row['appointment_date']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                    <td>" . htmlspecialchars($row['type']) . "</td>
                    <td>" . htmlspecialchars($row['customer_name']) . "</td>
                    <td>" . htmlspecialchars($row['customer_phone']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No appointments found</td></tr>";
    }
    exit();
}

$allAppointments = $mydb->viewAllAppointments($conObj, $technician_id);
?>
