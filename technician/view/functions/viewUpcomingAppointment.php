<?php
require '../../control/viewUpcomingAppointmentControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Appointments - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
</head>

<body class="table-pages">
    <div class="header">
        <div class="logo-container">
            <img src="../../images/icons/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="../layout/home.php" class="website-name">PCMartBD</a>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="../layout/home.php">Home</a></li>
            <li><a href="../layout/dashboard.php">Dashboard</a></li>
            <li><a href="../layout/settings.php">Settings</a></li>
            <li><a href="../layout/profile.php">Profile</a></li>
            <li><a href="../../../layout/view/login.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <div class="page-header">
                <button onclick="window.history.back()" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </button>
                <h2>View Upcoming Appointments</h2>
            </div>

            <!-- Appointment Table -->
            <?php if (empty($appointments)): ?>
                <p>No appointments found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                                <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                                <td><?= htmlspecialchars($appointment['status']) ?></td>
                                <td><?= htmlspecialchars($appointment['customer_name']) ?></td>
                                <td><?= htmlspecialchars($appointment['customer_phone']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
</body>

</html>