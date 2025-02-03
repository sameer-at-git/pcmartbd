<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require '../../model/db.php';

$technician_id = $_SESSION['technician_id'];
$mydb = new myDB();
$conObj = $mydb->openCon();
$actionRequiredAppointments = $mydb->viewActionRequiredAppointments($conObj, $technician_id);
$completedAppointments = $mydb->getCustomersByTechnician($conObj, $technician_id);

$allAppointments = $mydb->totalAppointmentByTechnicianID($conObj, $technician_id);
$inProgressAppointments = $mydb->inProgressAppointmentsByTechnicianID($conObj, $technician_id);
$completedAppoitments = $mydb->completedAppointmentByTechnicianID($conObj, $technician_id);
$totalReviews = $mydb->totalReviewsByTechnicianID($conObj, $technician_id);
$cancelledAppointments = $mydb->cancelledAppointmentsByTechnicianID($conObj, $technician_id);
if ($allAppointments > 0) {
    $completionRate = (($allAppointments - $cancelledAppointments) / $allAppointments) * 100;
    $completionRate = number_format($completionRate, 2);
} else {
    $completionRate = "N/A"; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Dashboard - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body class="table-pages">
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a class="active" href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Quick Statistics</h2>
            <div class="stats-wrapper">
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>All Appointments</h3>
                        <p><?php echo $allAppointments ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>In Progress Appointments</h3>
                        <p><?php echo $inProgressAppointments ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Completed Appointments</h3>
                        <p><?php echo $completedAppoitments ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Cancelled Appointments</h3>
                        <p><?php echo $cancelledAppointments ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Completion Rate</h3>
                        <p><?php echo $completionRate ?>%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Total Reviews</h3>
                        <p><?php echo $totalReviews ?></p>
                    </div>
                </div>
                <h2>Your Current Appointments</h2>
                <div class="activities">
                    <?php if (empty($actionRequiredAppointments)): ?>
                        <p>No appointments found.</p>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($actionRequiredAppointments as $row): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['appointment_id']) ?></td>
                                        <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                                        <td><?= htmlspecialchars($row['status']) ?></td>
                                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <h2>Recently Completed Appointments</h2>
                <div class="activities">
                    <?php if (empty($completedAppointments)): ?>
                        <p>No appointments found.</p>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($completedAppointments as $row): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['appointment_id']) ?></td>
                                        <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                                        <td><?= htmlspecialchars($row['status']) ?></td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>