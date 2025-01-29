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
    <title>Edit Profile - PCMartBD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <link rel="stylesheet" href="../../css/otherstyle.css">
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
                <h2>Edit Profile Information</h2>
            </div>

            <div class="edit-profile-container">
                <form action="../../control/updateProfile_control.php" method="POST" enctype="multipart/form-data" class="edit-profile-form">
                    <!-- Profile Photo Section -->
                    <div class="photo-section">
                        <div class="current-photo">
                            <img src="../../images/profile/default-avatar.png" alt="Profile Photo" id="profilePreview">
                        </div>
                        <div class="photo-upload">
                            <label for="profilePhoto" class="upload-btn">
                                <i class="fas fa-camera"></i>
                                Change Photo
                            </label>
                            <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" hidden>
                            <p class="photo-info">Maximum file size: 5MB (JPG, PNG)</p>
                        </div>
                    </div>

                    <!-- Personal Details Section -->
                    <div class="form-section">
                        <h3>Personal Details</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="fname">First Name:</label>
                                <input type="text" id="fname" name="fname" value="John" required>
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name:</label>
                                <input type="text" id="lname" name="lname" value="Doe" required>
                            </div>

                            <div class="form-group">
                                <label for="fathersname">Father's Name:</label>
                                <input type="text" id="fathersname" name="fathersname" value="James Doe">
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Male" checked> Male
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Female"> Female
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="gender" value="Others"> Others
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" id="dob" name="dob" value="1990-01-01" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" id="phone" name="phone" value="+880 1234567890" required>
                            </div>

                            <div class="form-group full-width">
                                <label for="address">Address:</label>
                                <textarea id="address" name="address" rows="3" required>123 Street, Dhaka, Bangladesh</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Work Details Section -->
                    <div class="form-section">
                        <h3>Work Details</h3>
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label for="experience">Experience:</label>
                                <textarea id="experience" name="experience" rows="4">5 years of experience in computer hardware repair and maintenance</textarea>
                            </div>

                            <div class="form-group">
                                <label for="workarea">Preferred Work Area:</label>
                                <select id="workarea" name="workarea" required>
                                    <option value="Mirpur">Mirpur</option>
                                    <option value="Uttara">Uttara</option>
                                    <option value="Dhanmondi">Dhanmondi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="workhour">Preferred Work Hours:</label>
                                <select id="workhour" name="workhour" required>
                                    <option value="Slot-1">Slot 1 - 7:00 AM to 12:00 PM</option>
                                    <option value="Slot-2">Slot 2 - 12:00 PM to 5:00 PM</option>
                                    <option value="Slot-3">Slot 3 - 5:00 PM to 11:00 PM</option>
                                    <option value="Slot-4">Slot 4 - 11:00 PM to 7:00 AM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">Update Profile</button>
                        <button type="reset" class="reset-button">Clear Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>

    <script>
        // Profile photo preview
        const profilePhoto = document.getElementById('profilePhoto');
        const profilePreview = document.getElementById('profilePreview');

        profilePhoto.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Form reset confirmation
        document.querySelector('.reset-button').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to clear all changes?')) {
                document.querySelector('.edit-profile-form').reset();
                profilePreview.src = '../../images/profile/default-avatar.png';
            }
        });
    </script>
</body>
</html>
