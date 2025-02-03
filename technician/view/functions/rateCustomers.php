<?php
require '../../control/rateCustomerControl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Customers - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/rateCustomerValidation.js"></script>
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
                <h2>Rate Your Customers</h2>
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
                <?php if ($customers && $customers->num_rows > 0): ?>

                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Appointment Status</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $customers->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['phone']) ?></td>
                                    <td><?= htmlspecialchars($row['appointment_status']) ?></td>
                                    <td>
                                        <form action="../../control/rateCustomerControl.php" method="POST" onsubmit="return validateComment(<?= $row['appointment_id']; ?>)">
                                            <select name="rating[<?= htmlspecialchars($row['appointment_id']) ?>]">
                                                <option value="" disabled>Select</option>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <option value="<?= $i ?>" <?= ($row['technician_rating'] == $i) ? 'selected' : '' ?>>
                                                        <?= $i ?>
                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                    </td>
                                    <td>
                                        <textarea name="comment[<?= htmlspecialchars($row['appointment_id']) ?>]" rows="2" cols="20" 
                                        id="comment_<?= $row['appointment_id']; ?>" onblur="return validateComment(<?= $row['appointment_id']; ?>)"><?= htmlspecialchars($row['technician_comment']) ?></textarea>
                                        <p id="comment_error_<?= $row['appointment_id']; ?>" class="error-message"></p>
                                    </td>
                                    <td>
                                        <button type="submit" name="submit_rating" value="<?= htmlspecialchars($row['appointment_id']) ?>">Submit</button>
                                    </td>
                                    </form>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                <?php else: ?>
                    <p>No customers found for your appointments.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>