<?php
require '../../control/reportIssueControl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Issue - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/reportIssueValidation.js"></script>
</head>

<body>
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
                <h2>Report Issue</h2>
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

            <div class="contact-container">
                <form action="../../control/reportIssueControl.php" method="POST" class="contact-form" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject" onchange="return validateSubject()">
                            <option value="">Select a subject</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Payment Related">Payment Related</option>
                            <option value="Schedule Change">Schedule Change</option>
                            <option value="Customer Dispute">Customer Dispute</option>
                            <option value="Account Related">Account Related</option>
                            <option value="Service Area">Service Area</option>
                            <option value="Other">Other</option>
                        </select>
                        <p id="subjecterr" class="error-message"></p>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority Level:</label>
                        <select id="priority" name="priority" onchange="return validatePriorityLevel()">
                            <option value="">Select priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                        <p id="priorityerr" class="error-message"></p>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="8"
                            placeholder="Please describe your concern in detail..." onblur="return validateMessage()"></textarea>
                        <p id="messageerr" class="error-message"></p>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">Send Message</button>
                        <button type="reset" class="reset-button">Clear Form</button>
                    </div>
                </form>
                <div class="previous-reports">
                    <h2>Previous Reports</h2>
                    <div class="report-list">
                        <?php if ($reports && $reports->num_rows > 0): ?>
                            <?php while ($report = $reports->fetch_assoc()): ?>
                                <h3><?= htmlspecialchars($report['subject']); ?></h3>
                                <p class="report-info">Date: <?= htmlspecialchars($report['sent_date']); ?></p>
                                <p class="priority">Priority Level: <?= htmlspecialchars($report['priority']); ?></p>
                                <p class="report-message"><?= "You Message: " . htmlspecialchars($report['message']); ?></p>
                                <p class="response-message">
                                    <?= 'Response: ' . ($report['emp_response'] ? htmlspecialchars($report['emp_response']) : 'No response yet'); ?>
                                </p>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No reports found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>