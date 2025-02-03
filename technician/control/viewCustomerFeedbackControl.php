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

if(isset($_POST['rating'])) {
    $rating = $_POST['rating'];
    
    if ($rating === 'all') {
        $result = $mydb->getCustomerFeedback($conObj, $technician_id);
    } else if ($rating === 'not_rated') {
        $result = $mydb->filterFeedback($conObj, 0, $technician_id);
    } else {
        $result = $mydb->filterFeedback($conObj, $rating, $technician_id);
    }
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['appointment_id']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td>" . htmlspecialchars($row['appointment_status']) . "</td>
                    <td>" . htmlspecialchars($row['customer_rating'] == 0 || $row['customer_rating'] === null ? 'Not Rated' : $row['customer_rating']) . "</td>
                    <td>" . htmlspecialchars(empty($row['customer_comment']) ? 'No Comment' : $row['customer_comment']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No appointments with feedback found</td></tr>";
    }
    exit();
}

$feedback = $mydb->getCustomerFeedback($conObj, $technician_id);
?>
