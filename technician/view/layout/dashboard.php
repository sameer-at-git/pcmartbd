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
$upcomingAppointments = $mydb->viewUpcomingAppointments($technician_id, $conObj);
$completedAppointments = $mydb->viewAppointmentHistory($technician_id, $conObj);
$allAppointments = $mydb->totalAppointmentByTechnicianID($conObj, $technician_id);
$allAppointmentsCount = $allAppointments->fetch_assoc()['total_appointments'];
$pendingAppoitments = $mydb->pendingAppointmentByTechnicianID($conObj, $technician_id);
$pendingAppoitmentsCount = $pendingAppoitments->fetch_assoc()['pending_appointments'];
$completedAppoitments = $mydb->completedAppointmentByTechnicianID($conObj, $technician_id);
$completedAppoitmentsCount = $completedAppoitments->fetch_assoc()['completed_appointments'];
$totalReviews = $mydb->totalReviewsByTechnicianID($conObj, $technician_id);
$totalReviewsCount = $totalReviews->fetch_assoc()['total_reviews'];
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
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <h2>Quick Statistics</h2>
            <div class="stats-wrapper">
                <div class="stats-container">
                    <div class="stat-box">
                        <h3>All Appointments</h3>
                        <p><?php echo $allAppointmentsCount ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Pending Appointments</h3>
                        <p><?php echo $pendingAppoitmentsCount ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Completed Appointments</h3>
                        <p><?php echo $completedAppoitmentsCount ?></p>
                    </div>
                    <div class="stat-box">
                        <h3>Total Reviews</h3>
                        <p><?php echo $totalReviewsCount ?></p>
                    </div>
                </div>
                <h2>Upcoming Appointments</h2>
                <div class="activities">
                    <?php if (empty($upcomingAppointments)): ?>
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
                                <?php foreach ($upcomingAppointments as $row): ?>
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
                                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
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