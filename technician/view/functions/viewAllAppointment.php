<?php
require '../../control/viewAllAppointmentControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Appointments - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/appointments_ajax.js"></script>
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
            <li><a class="active" href="../layout/home.php">Home</a></li>
            <li><a href="../layout/dashboard.php">Dashboard</a></li>
            <li><a href="../layout/settings.php">Settings</a></li>
            <li><a href="../layout/profile.php">Profile</a></li>
            <li><a href="../../../technician/control/sessionout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="content">
            <div class="page-header">
                <a href="../layout/home.php" class="back-button">
                    Back to Home
                </a>
                <h2>View All Appointments</h2>
                <div class="search-icon-and-bar">
                    <img src="../../images/icons/magnifying-glass-solid.svg" alt="Search" class="icon">
                    <input type="text" id="searchAppointment" onkeyup="searchAppointments(this.value)" placeholder="Search appointments..." class="search-bar">
                </div>
            </div>
            <div class="search-results-area">
                <table class="search-results-table">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                        </tr>
                    </thead>
                    <tbody id="searchResults">
                        <?php if ($allAppointments && $allAppointments->num_rows > 0): ?>
                            <?php while ($appointment = $allAppointments->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                                    <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                                    <td><?= htmlspecialchars($appointment['status']) ?></td>
                                    <td><?= htmlspecialchars($appointment['type']) ?></td>
                                    <td><?= htmlspecialchars($appointment['customer_name']) ?></td>
                                    <td><?= htmlspecialchars($appointment['customer_phone']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No appointments found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>