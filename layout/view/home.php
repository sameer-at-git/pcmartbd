<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PCMartBD - One Stop Solution for Hardware and Repairings</title>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
        <div class="signup">
            <a href="../../customer/view/sign_up.php" class="signup-link">Create Account</a>
        </div>
    </div>
    <div class="navbar">
        <div class="nav-container">
            <table>
                <tr>
                    <td><a href="home.php" class="active">Home</a></td>
                    <td><a href="browse.php">Browse</a></td>
                    <td><a href="faq.php">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="about-container">
        <div class="about-header">
            <h1>Welcome to PCMartBD</h1>
            <p class="tagline">Your One-Stop Shop for Premium Computer Hardware and Repairings</p>
        </div>

        <div class="features-container">
            <h2>Featured Categories</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Processors</h3>
                    <p>Latest AMD & Intel CPUs</p>
                </div>
                <div class="feature-card">
                    <h3>Graphics Cards</h3>
                    <p>High-performance GPUs</p>
                </div>
                <div class="feature-card">
                    <h3>Motherboards</h3>
                    <p>Quality Gaming Boards</p>
                </div>
                <div class="feature-card">
                    <h3>Storage</h3>
                    <p>SSDs & Hard Drives</p>
                </div>
            </div>
        </div>


        <div class="about-grid">
            <div class="about-section">
                <h2>Hardware Sales</h2>
                <p>Browse our extensive collection of computer parts from trusted brands. We offer competitive prices and genuine products with warranty.</p>
                <a href="browse.php" class="back-button">Shop Now</a>
            </div>
            <div class="about-section">
                <h2>Repair Services</h2>
                <p>Professional computer repair services by certified technicians. Fast, reliable, and affordable solutions for all your hardware problems.</p>
                <a href="repair.php" class="back-button">Book Repair</a>
            </div>
        </div>

        <div class="team-section">
            <h2>Why Choose Us</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-info">
                        <h3>Genuine Products</h3>
                        <p>All products come with official warranty and guarantee</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-info">
                        <h3>Expert Support</h3>
                        <p>Technical guidance from hardware specialists</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-info">
                        <h3>Fast Delivery</h3>
                        <p>Quick and secure shipping nationwide</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-section">
            <h2>Need Help?</h2>
            <div class="contact-info">
                <p>Email: pcmartbd@gmail.com</p>
                <p>Phone: +880 184-247-3434</p>
                <p>Address: Tech Plaza, Dhaka, Bangladesh</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>

</html>