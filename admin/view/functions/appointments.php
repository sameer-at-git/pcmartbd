<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$result = $db->getAllAppointments($conn);
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Appointments</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
    <link rel="stylesheet" href="../../css/index.css">

</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
        <div class="admin-info">
            <a href="../layout/profile.php" class="admin-link">
                <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
                <div class="admin-name"><?php echo $userInfo['name']; ?></div>
            </a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="../layout/home.php" class="active">Home</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/broadcast.php" >Broadcast</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="appointments-container">
        <h2>Appointments</h2>


        <?php
        if ($result->num_rows > 0) {

        ?>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Appointment Date</th>
                        <th>Appointment Type</th>
                        <th>Appointment Details</th>
                        <th>Status</th>
                        <th>Technician Name</th>
                        <th>Customer Name</th>
                        <th>Technician Rating</th>
                        <th>Technician Comments</th>
                        <th>Customer Rating</th>
                        <th>Customer Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $technician_name = "No technicians Added";
                        if (!empty($row["technician_id"])) {
                            $tech_result = $db->getTechnicianByID($conn, $row["technician_id"]);
                            $tech_row = $tech_result->fetch_assoc();
                            $technician_name = $tech_row['technician_name'];
                        }
                        $cust_result = $db->getCustomerByID($conn, $row["customer_id"]);
                        $cust_row = $cust_result->fetch_assoc();
                        $customer_name = $cust_row['name'];
                    ?>
                        <tr>
                            <td><?php echo $row["appointment_id"]; ?></td>
                            <td><?php echo $row["appointment_date"]; ?></td>
                            <td><?php echo $row["type"]; ?></td>
                            <td><?php echo $row["details"]; ?></td>
                            <td><div class="status-<?php echo $row['status']; ?>"><?php echo $row["status"]; ?></td>
                            <td><?php echo  $technician_name; ?></td>
                            <td><?php echo  $customer_name; ?></td>
                            <td><?php echo $row["technician_rating"]; ?></td>
                            <td><?php echo $row["technician_comment"]; ?></td>
                            <td><?php echo $row["customer_rating"]; ?></td>
                            <td><?php echo $row["customer_comment"]; ?></td>
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