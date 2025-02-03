<?php
require '../../control/viewAvailableAppointmentsControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Required Appointments - PCMartBD</title>
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
                <h2>Action Required Appointments</h2>
                <?php if (!empty($_SESSION['errors'])): ?>
                    <div class="alert error">
                        <ul>
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['successMessage'])): ?>
                    <div class="alert success"><?= $_SESSION['successMessage'];
                                                unset($_SESSION['successMessage']); ?></div>
                <?php endif; ?>
            </div>

            <?php if (empty($appointments)): ?>
                <p>No appointments found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($appointment = $appointments->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                                <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                                <td><?= htmlspecialchars($appointment['status']) ?></td>
                                <td><?= htmlspecialchars($appointment['type']) ?></td>
                                <td><?= htmlspecialchars($appointment['details']) ?></td>
                                <td><?= htmlspecialchars($appointment['customer_name']) ?></td>
                                <td><?= htmlspecialchars($appointment['customer_phone']) ?></td>
                                <td>
                                    <form action="../../control/viewAvailableAppointmentsControl.php" method="POST">
                                        <input type="hidden" name="appointment_id" value="<?= htmlspecialchars($appointment['appointment_id']) ?>">
                                        <button type="submit">Take This Appointment</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>