    <?php
    session_start();
    if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
        header('Location: ../../../layout/login.php');
        exit();
    }
    include('../../model/db.php');
    $db = new myDB();
    $conn = $db->openCon();
    $aid = $_SESSION['admin_id'];
    $userInfo = $db->getUserInfo($conn, $aid);
    ?>
    <html>

    <head>
        <title>Admin Profile</title>

        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/layout.css">
    </head>

    <body class="profile-body">
        <div class="header">
            <div class="logo-container">
                <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
                <a href="home.php" class="website-name">
                    <p>PCMartBD</p>
                </a>
            </div>
            <div class="admin-info">
                <a href="profile.php" class="admin-link-active" >
                    <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
                    <div class="admin-name"><?php echo $userInfo['name']; ?></div>
                </a>
            </div>
        </div>



        <div class="navbar">
            <div>
                <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="broadcast.php" >Broadcast</a></td>
                    <td><a href="contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>

                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="content">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Access Type</h3>
                    <div class="stat-value"><?php echo $userInfo['access']; ?></div>
                </div>
            </div>
            <h1>Profile Information</h1>
            <div class="profile-info">
                <div class="info-item">
                    <div class="info-label">Full-Name:</div>
                    <div class="info-value"><?php echo $userInfo['name']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email:</div>
                    <div class="info-value"><?php echo $userInfo['email']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Phone:</div>
                    <div class="info-value"><?php echo $userInfo['number']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Gender:</div>
                    <div class="info-value"><?php echo $userInfo['gender']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Present Address:</div>
                    <div class="info-value"><?php echo $userInfo['presentaddress']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Permanent Address:</div>
                    <div class="info-value"><?php echo $userInfo['permanentaddress']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date of Birth:</div>
                    <div class="info-value"><?php echo $userInfo['dob']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date of Joining:</div>
                    <div class="info-value"><?php echo $userInfo['doj']; ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Bio/Link:</div>
                    <div class="info-value"><?php echo $userInfo['bio']; ?></div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2024 PCMartBD. All rights reserved.</p>
        </div>
        </div>
    </body>

    </html>
    <?php
    $conn->close();
    ?>