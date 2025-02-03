<?php
require '../../control/contactCustomersControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Customers - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/contactCustomerValidation.js"></script>
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
                <a href="../layout/home.php" class="back-button">Back to Home</a>
                <h2>Contact Customers</h2>



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
            <div class="table">
                <table>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Previous Customer Message</th>
                        <th>Previous Technician Message</th>
                        <th>New Message</th>
                        <th>Action</th>
                    </tr>
                    <?php if ($appointments && $appointments->num_rows > 0): ?>
                        <?php while ($appointment = $appointments->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['appointment_id']); ?></td>
                                <td><?= htmlspecialchars($appointment['customer_name']); ?></td>
                                <td><?= htmlspecialchars($appointment['status']); ?></td>
                                <td><?= htmlspecialchars($appointment['previous_customer_message'] ?? 'No message yet'); ?></td>
                                <td><?= htmlspecialchars($appointment['previous_technician_message'] ?? 'No message yet'); ?></td>
                                <td>
                                    <form method="POST" onsubmit="return validateMessage(<?= $appointment['appointment_id']; ?>)">
                                        <input type="hidden" name="appointment_id" value="<?= $appointment['appointment_id']; ?>">
                                        <input type="text" name="message" id="message_<?= $appointment['appointment_id']; ?>"
                                            placeholder="Type message..."
                                            onkeyup="return validateMessage(<?= $appointment['appointment_id']; ?>)">
                                        <p id="message_error_<?= $appointment['appointment_id']; ?>" class="error-message"></p>
                                </td>
                                <td>
                                    <button type="submit" name="sendMessage">Send</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No eligible appointments found.</td>
                        </tr>
                    <?php endif; ?>

                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>

</body>

</html>