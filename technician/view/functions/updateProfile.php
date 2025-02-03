<?php
require __DIR__ . '/../../control/updateProfileControl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - PCMartBD</title>
    <link rel="stylesheet" href="../../css/mainstyle.css">
    <script src="../../javascript/updateProfileValidation.js"></script>
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
                <h2>Edit Profile Information</h2>
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

            <div class="edit-profile-container">


                <div class="photo-section">
                    <div class="current-photo">
                        <img src="<?php echo "../" . $userInfo['photo']; ?>" alt="Technician Image" id="profilePreview" class="admin-image">
                    </div>
                </div>
                <div class="photo-buttons">
                    <form action="../../control/deletePhotoControl.php" method="POST">
                        <button type="submit" name="delete_photo" class="delete-btn">
                            <img src="../../images/icons/trash-solid.svg" alt="Trash Icon" class="icon">
                            Delete Photo
                        </button>
                    </form>
                    <form action="../../control/updateProfileControl.php" method="POST" enctype="multipart/form-data" class="edit-profile-form" onsubmit="return validateUpdate()">
                        <div class="photo-upload">
                            <label for="profilePhoto" class="upload-btn">
                                <img src="../../images/icons/camera-solid.svg" alt="Add Icon" class="icon">
                                Change Photo
                            </label>
                            <input type="file" id="profilePhoto" name="photo" accept="image/*" hidden>
                        </div>

                </div>
                <p class="photo-info">Maximum file size: 5MB (JPG, PNG)</p>

            </div>

            <div class="profile-container">
                <div class="profile-card">
                    <h3><img src="../../images/icons/user-solid.svg" alt="Personal Icon" class="icon">
                        Personal Details</h3>
                    <div class="profile-info">
                        <div class="form-group-profile">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" value="<?php echo $userInfo['first_name'] ?>">
                            <p id="fnameerr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" value="<?php echo $userInfo['last_name'] ?>">
                            <p id="lnameerr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile">
                            <label for="fathersname">Father's Name:</label>
                            <input type="text" id="fathersname" name="fathersname" value="<?php echo $userInfo['father_name'] ?>">
                            <p id="fathersnameerr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile">
                            <label>Gender:</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="Male" <?php echo ($userInfo['gender'] === 'Male') ? 'checked' : ''; ?>> Male
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="Female" <?php echo ($userInfo['gender'] === 'Female') ? 'checked' : ''; ?>> Female
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="Others" <?php echo ($userInfo['gender'] === 'Others') ? 'checked' : ''; ?>> Others
                                </label>
                                <p id="gendererr" class="error-message"></p>
                            </div>
                        </div>

                        <div class="form-group-profile">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" value="<?php echo $userInfo['dob'] ?>">
                            <p id="doberr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo $userInfo['phone'] ?>">
                            <p id="phoneerr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile full-width">
                            <label for="address">Address:</label>
                            <textarea id="address" name="address" rows="3"><?php echo $userInfo['address'] ?></textarea>
                            <p id="addresserr" class="error-message"></p>
                        </div>
                    </div>
                </div>
                <div class="profile-card">
                    <h3><img src="../../images/icons/briefcase-solid.svg" alt="Work Icon" class="icon">
                        Work Details</h3>
                    <div class="form-grid">
                        <div class="form-group-profile full-width">
                            <label for="experience">Experience:</label>
                            <textarea id="experience" name="experience" rows="4"><?php echo $userInfo['experience'] ?></textarea>
                            <p id="experienceerr" class="error-message"></p>
                        </div>

                        <div class="form-group-profile">
                            <label for="workarea">Preferred Work Area:</label>
                            <select id="workarea" name="workarea">
                                <option value="Mirpur" <?php echo ($userInfo['work_area'] === 'Mirpur') ? 'selected' : ''; ?>>Mirpur</option>
                                <option value="Uttara" <?php echo ($userInfo['work_area'] === 'Uttara') ? 'selected' : ''; ?>>Uttara</option>
                                <option value="Dhanmondi" <?php echo ($userInfo['work_area'] === 'Dhanmondi') ? 'selected' : ''; ?>>Dhanmondi</option>
                            </select>
                            <p id="workareaerr" class="error-message"></p>
                        </div>


                        <div class="form-group-profile">
                            <label for="workhour">Preferred Work Hours:</label>
                            <select id="workhour" name="workhour">
                                <option value="Slot-1" <?php echo ($userInfo['work_hour'] === 'Slot-1') ? 'selected' : ''; ?>>Slot 1 - 7:00 AM to 12:00 PM</option>
                                <option value="Slot-2" <?php echo ($userInfo['work_hour'] === 'Slot-2') ? 'selected' : ''; ?>>Slot 2 - 12:00 PM to 5:00 PM</option>
                                <option value="Slot-3" <?php echo ($userInfo['work_hour'] === 'Slot-3') ? 'selected' : ''; ?>>Slot 3 - 5:00 PM to 11:00 PM</option>
                                <option value="Slot-4" <?php echo ($userInfo['work_hour'] === 'Slot-4') ? 'selected' : ''; ?>>Slot 4 - 11:00 PM to 7:00 AM</option>
                            </select>
                            <p id="workhourerr" class="error-message"></p>
                        </div>

                    </div>
                </div>
                <div class="profile-card">
                    <h3><img src="../../images/icons/id-card-regular.svg" alt="Account Icon" class="icon">
                        Account Details</h3>
                    <div class="form-grid">
                        <div class="form-group-profile full-width">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?php echo $userInfo['email'] ?>" onblur="return validateEmail()">
                            <p id="emailerr" class="error-message"></p>
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
    </div>

    <div class="footer">
        <p>&copy; 2025 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>