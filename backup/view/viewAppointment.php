<?php
include '../control/viewAppointment_control.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Appointments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Your Appointments</h1>
    
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
