<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - PCMartBD</title>
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
                    <td><a href="about.php" class="active">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </table>
        </div>
</div>

    <div class="about-container">
        <div class="about-header">
            <h1>About Computer Repair & Parts Management</h1>
            <p class="tagline">Your Trusted Partner in Computer Care and Components</p>
        </div>

        <div class="about-grid">
            <div class="about-section mission">
                <h2>Our Mission</h2>
                <p>To provide exceptional computer repair services and quality computer parts while ensuring customer satisfaction through professional expertise and reliable solutions.</p>
            </div>

            <div class="about-section vision">
                <h2>Our Vision</h2>
                <p>To become the leading computer repair and parts provider, known for excellence, innovation, and customer-centric service delivery.</p>
            </div>
        </div>

        <div class="features-container">
            <h2>What We Offer</h2>
            <div class="features-grid">
                <div class="feature-card repairs">
                    <h3>Expert Repairs</h3>
                    <p>Professional computer repair services by certified technicians</p>
                </div>

                <div class="feature-card parts">
                    <h3>Quality Parts</h3>
                    <p>Genuine computer components and accessories from trusted brands</p>
                </div>

                <div class="feature-card support">
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock technical assistance and customer service</p>
                </div>

                <div class="feature-card management">
                    <h3>Efficient Management</h3>
                    <p>Streamlined repair tracking and inventory management</p>
                </div>
            </div>
        </div>

        <div class="team-section">
            <h2>Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-info">
                        <h3>Technical Experts</h3>
                        <p>Certified professionals with years of experience in computer repair and maintenance</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-info">
                        <h3>Support Staff</h3>
                        <p>Dedicated customer service representatives ensuring smooth operations</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-info">
                        <h3>Management Team</h3>
                        <p>Experienced leaders guiding our service excellence</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-section">
            <h2>Get in Touch</h2>
            <div class="contact-info">
                <p>Email: support@computerrepair.com</p>
                <p>Phone: +1 (555) 123-4567</p>
                <p>Address: 123 Tech Street, Digital City, DC 12345</p>
            </div>
        </div>

        <div class="back-section">
            <a href="../index.php" class="back-button">← Back to Home</a>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
