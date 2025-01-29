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
                <h2>Report Issue</h2>
            </div>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert success">Message sent successfully!</div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert error">Error sending message. Please try again.</div>
            <?php endif; ?>

            <div class="contact-container">
                <form action="../../control/reportIssueControl.php" method="POST" class="contact-form">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Payment Related">Payment Related</option>
                            <option value="Schedule Change">Schedule Change</option>
                            <option value="Customer Dispute">Customer Dispute</option>
                            <option value="Account Related">Account Related</option>
                            <option value="Service Area">Service Area</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority Level:</label>
                        <select id="priority" name="priority" required>
                            <option value="">Select priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="8" required
                            placeholder="Please describe your concern in detail..."></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">Send Message</button>
                        <button type="reset" class="reset-button">Clear Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>