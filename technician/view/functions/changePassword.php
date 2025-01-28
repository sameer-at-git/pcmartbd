<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - PCMartBD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                    <img src="../../images/icons/arrow-left-solid.svg" alt="Back" class="icon">
                    Back
                </button>
                <h2>Change Password</h2>
            </div>

            <div class="password-change-container">
                <form action="../../control/changePassword_control.php" method="POST" class="password-form" id="passwordForm">
                    <div class="form-group">
                        <label for="currentPassword">Current Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="currentPassword" name="currentPassword" required>
                            <i class="fas fa-eye-slash toggle-password" data-target="currentPassword"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="newPassword" name="newPassword" required>
                            <i class="fas fa-eye-slash toggle-password" data-target="newPassword"></i>
                        </div>
                        <div class="password-requirements">
                            <p>Password must contain:</p>
                            <ul>
                                <li id="length">At least 8 characters</li>
                                <li id="uppercase">One uppercase letter</li>
                                <li id="lowercase">One lowercase letter</li>
                                <li id="number">One number</li>
                                <li id="special">One special character</li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <div class="password-input-group">
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                            <i class="fas fa-eye-slash toggle-password" data-target="confirmPassword"></i>
                        </div>
                        <span id="passwordMatch" class="match-message"></span>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button" disabled>Change Password</button>
                        <button type="reset" class="reset-button">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>

    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', () => {
                const targetId = icon.getAttribute('data-target');
                const input = document.getElementById(targetId);
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });

        // Password validation
        const newPassword = document.getElementById('newPassword');
        const confirmPassword = document.getElementById('confirmPassword');
        const submitButton = document.querySelector('.submit-button');
        const passwordMatch = document.getElementById('passwordMatch');

        function validatePassword() {
            const password = newPassword.value;
            const confirm = confirmPassword.value;
            
            // Check requirements
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*]/.test(password)
            };

            // Update requirement list
            Object.keys(requirements).forEach(req => {
                const li = document.getElementById(req);
                if (requirements[req]) {
                    li.classList.add('met');
                } else {
                    li.classList.remove('met');
                }
            });

            // Check if passwords match
            if (password && confirm) {
                if (password === confirm) {
                    passwordMatch.textContent = 'Passwords match!';
                    passwordMatch.classList.add('match');
                    passwordMatch.classList.remove('no-match');
                } else {
                    passwordMatch.textContent = 'Passwords do not match';
                    passwordMatch.classList.add('no-match');
                    passwordMatch.classList.remove('match');
                }
            } else {
                passwordMatch.textContent = '';
            }

            // Enable/disable submit button
            const allRequirementsMet = Object.values(requirements).every(Boolean);
            const passwordsMatch = password === confirm && password !== '';
            submitButton.disabled = !(allRequirementsMet && passwordsMatch);
        }

        newPassword.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);
    </script>
</body>
</html>
