<?php
require '../../control/changePasswordControl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <link rel="stylesheet" href="../../css/otherstyle.css">
    <script src="../../javascript/changePassword.js"></script>
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
            <li><a class="active" href="../layout/settings.php">Settings</a></li>
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

                <h2>Change Password</h2>
            </div>

            <div class="password-change-container">
                <?php if (isset($_SESSION['successMessage'])): ?>
                    <p class="success-message"><?= $_SESSION['successMessage'] ?></p>
                    <?php unset($_SESSION['successMessage']); ?>
                <?php endif; ?>

                <form action="../../control/changePasswordControl.php" method="POST" class="password-form" id="passwordForm" onsubmit="return validateChangePassword()">
                    <div class="form-group">
                        <label for="currentPassword">Current Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="currentPassword" name="currentPassword" onkeyup="return validateCurrentPassword()">
                            <img src="../../images/icons/hidden.png" alt="Toggle Password" class="icon" data-state="hidden" onclick="togglePassword(this, 'currentPassword')">
                        </div>
                        <p id="currentpasserr" class="error-message">
                            <?= $_SESSION['currentPasswordError'] ?? '' ?>
                            <?php unset($_SESSION['currentPasswordError']); ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="newPassword" name="newPassword" onkeyup="return validateNewPassword()">
                            <img src="../../images/icons/hidden.png" alt="Toggle Password" class="icon" data-state="hidden" onclick="togglePassword(this, 'newPassword')">
                        </div>
                        <p id="newpasserr" class="error-message">
                            <?= $_SESSION['newPasswordError'] ?? '' ?>
                            <?php unset($_SESSION['newPasswordError']); ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="confirmPassword" name="confirmPassword" onkeyup="return validateConfirmPassword()">
                            <img src="../../images/icons/hidden.png" alt="Toggle Password" class="icon" data-state="hidden" onclick="togglePassword(this, 'confirmPassword')">
                        </div>
                        <p id="conpasserr" class="error-message">
                            <?= $_SESSION['confirmPasswordError'] ?? '' ?>
                            <?php unset($_SESSION['confirmPasswordError']); ?>
                        </p>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">Change Password</button>
                        <button type="reset" class="reset-button">Clear</button>
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