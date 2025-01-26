<?php
include '../control/viewAppointment_control.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Appointments</title>
    <link rel="stylesheet" href="../css/viewAppointmentStyle.css">
</head>
<body>
    <h1>Your Appointments</h1>

    <!-- Search and Filter Form -->
    <form method="post">
        <label for="search">Search by Appointment ID:</label>
        <input type="text" id="search" name="search" value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>">
        
        <label for="filterColumn">Filter By:</label>
        <select id="filterColumn" name="filterColumn">
            <option value="">None</option>
            <option value="status" <?= isset($_POST['filterColumn']) && $_POST['filterColumn'] === 'status' ? 'selected' : '' ?>>Status</option>
            <option value="customer_name" <?= isset($_POST['filterColumn']) && $_POST['filterColumn'] === 'customer_name' ? 'selected' : '' ?>>Customer Name</option>
        </select>
        
        <input type="text" id="filterValue" name="filterValue" placeholder="Filter Value" value="<?= isset($_POST['filterValue']) ? htmlspecialchars($_POST['filterValue']) : '' ?>">
        
        <button type="submit">Search</button>
    </form>
    
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
