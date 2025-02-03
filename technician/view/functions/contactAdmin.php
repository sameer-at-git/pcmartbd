<?php
require '../../control/contactAdminControl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/contactAdminValidation.js"></script>
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
                <h2>Contact Administration</h2>
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

            <div class="contact-info-box">
                <h3>When to Use This Form</h3>
                <p>This form is specifically for direct communication with the administration regarding:</p>
                <ul>
                    <li>Urgent personal matters</li>
                    <li>Confidential issues</li>
                    <li>Direct administrative support</li>
                    <li>Emergency situations</li>
                </ul>
                <div class="info-note">
                    <img src="../../images/icons/circle-info-solid.svg" alt="Add Icon" class="icon">
                    <p>For platform-related issues, technical problems, or general support, please use the
                        <a href="reportIssue.php">Report Issue</a> page instead.
                    </p>
                </div>
            </div>

            <div class="contact-container">
                <form action="../../control/contactAdminControl.php" method="POST" class="contact-form" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" placeholder="Enter the subject of your message" onblur="return validateSubject()">
                        <p id="subjecterr" class="error-message"></p>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="8" placeholder="Please write your message to the administration..." onblur="return validateMessage()"></textarea>
                        <p id="messageerr" class="error-message"></p>
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