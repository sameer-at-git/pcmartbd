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
$email = $userInfo['email'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $db->insertMessage($email, $subject, $message, $conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Admin - PCMartBD</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/layout.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
        <div class="admin-info">
            <a href="profile.php" class="admin-link">
                <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
                <div class="admin-name"><?php echo $userInfo['name']; ?></div>
            </a>
        </div>
    </div>
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="dashboard.php">Dashboard</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="update_profile.php">Account</a></td>
                    <td><a href="contact_admin.php" class="active">Contact Admins</a></td>
                    <td><a href="contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>

                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="main">
            <div class="contact-form-wrapper">
                <form action="" method="POST" class="contact-form">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" name="subject" id="subject" placeholder="Enter subject">
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" rows="6" placeholder="Write your message here...">
                        </textarea>
                    </div>

                    <button type="submit" class="btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    <?php $db->closeCon($conn); ?>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>