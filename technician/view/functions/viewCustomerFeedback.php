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
    <script src="../../javascript/customerFeedback_ajax.js"></script>
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
                <h2>View Customer Feedback</h2>
            </div>

            <div class="filter-rating">
                <img src="../../images/icons/filter-solid.svg" alt="filter" class="icon"> Filter by Rating
                <form action="">
                    <select name="rating" onchange="showRating(this.value)">
                        <option value="all">Show All</option>
                        <option value="not_rated">Not Rated</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </form>
            </div>

            <div class="search-results-area">
                <table class="search-results-table">
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
                    <tbody id="filterResults">
                        <?php if ($feedback && $feedback->num_rows > 0): ?>
                            <?php while ($row = $feedback->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['appointment_id']) ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['phone']) ?></td>
                                    <td><?= htmlspecialchars($row['appointment_status']) ?></td>
                                    <td><?= htmlspecialchars($row['customer_rating'] == 0 || $row['customer_rating'] === null ? 'Not Rated' : $row['customer_rating']) ?></td>
                                    <td><?= htmlspecialchars(empty($row['customer_comment']) ? 'No Comment' : $row['customer_comment']) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No appointments with feedback found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>

</body>

</html>