<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../model/db.php');
    $db = new UserDB();
    $conn = $db->openCon();
    
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if ($db->insertMessage($email, $subject, $message, $conn)) {
        echo "<div class='success-message'>Message sent successfully!</div>";
    } else {
        echo "<div class='error-message'>Error sending message. Please try again.</div>";
    }
    
    $db->closeCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Admin - PCMartBD</title>
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
<div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
        <div class="signup">
            <a href="../../customer/view/sign_up.php" class="signup-link">Create Account</a>
        </div>
    </div>
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php">Home</a></td>
                    <td><a href="browse.php">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php" class="active">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </table>
        </div>
</div>

    <div class="about-container">
        <div class="about-header">
            <h1>Contact Administration</h1>
            <p class="tagline">Get in touch with our support team</p>
        </div>

        <div class="about-grid">
            <div class="about-section">
                <h2>Direct Contact Methods</h2>
                <div class="contact-info">
                    <div class="contact-method">
                        <div class="contact-icon">
                            <img src="../images/emailus.jpg" alt="Email Icon">
                        </div>
                        <div class="contact-details">
                            <h3>Email Us</h3>
                            <p class="contact-link">pcmartbd@gmail.com</p>
                            <p class="contact-description">Available 24/7 for your inquiries</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <img src="../images/callus.jpeg" alt="Phone Icon">
                        </div>
                        <div class="contact-details">
                            <h3>Call Us</h3>
                            <p class="contact-link">+880 184-247-3434</p>
                            <p class="contact-description">Mon-Fri: 9AM to 6PM</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-icon">
                            <img src="../images/wpus.png" alt="WhatsApp Icon">
                        </div>
                        <div class="contact-details">
                            <h3>WhatsApp</h3>
                            <p class="contact-link">+880 184-247-3434</p>
                            <p class="contact-description">Quick responses within minutes</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-section">
                <h2>Send Message</h2>
                <form method="POST" action="" class="question-form">
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="text" id="email" name="email" >
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" >
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="6" ></textarea>
                    </div>

                    <button type="submit" class="submit-button">Send Message</button>
                </form>
            </div>
        </div>

        <div class="back-section">
            <a href="home.php" class="back-button">← Back to Home</a>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
