<?php
require '../../control/viewCustomerFeedbackControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer Feedback - PCMartBD</title>
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
                    Back
                </button>
                <h2>View Customer Feedback</h2>
            </div>

            <!-- Appointment Table -->
            <?php if (empty($feedback)): ?>
                <p>No appointments found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Appointment Status</th>
                            <th>Rating</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feedback as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['appointment_id']) ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['appointment_status']) ?></td>
                                <td>
                                    <?= htmlspecialchars($row['customer_rating'] == 0 || $row['customer_rating'] === null ? 'Not Rated' : $row['customer_rating']) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(empty($row['customer_comment']) ? 'No Comment' : $row['customer_comment']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            <?php endif; ?>

</body>

</html>