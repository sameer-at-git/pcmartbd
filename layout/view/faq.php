<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FAQ - PCMartBD</title>
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
                    <td><a href="faq.php" class="active">FAQ</a></td>
                    <td><a href="about.php">About</a></td>
                    <td><a href="contact.php">Contact Admin</a></td>
                    <td><a href="repair.php">Repair</a></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </table>
        </div>
</div>

    <div class="about-container">
        <div class="faq-header">
            <h1>Frequently Asked Questions</h1>
            <p class="tagline">Find answers to common questions about our services and products</p>
        </div>

        <div class="faq-grid">
            <div class="faq-section">
                <h2>Repair Services</h2>
                <div class="faq-item">
                    <h3>What types of computer repairs do you offer?</h3>
                    <p>We offer a comprehensive range of repair services including hardware repairs, software troubleshooting, virus removal, data recovery, and system upgrades.</p>
                </div>
                <div class="faq-item">
                    <h3>How long does a typical repair take?</h3>
                    <p>Most repairs are completed within 24-48 hours, depending on the complexity of the issue and parts availability.</p>
                </div>
            </div>

            <div class="faq-section">
                <h2>Parts & Products</h2>
                <div class="faq-item">
                    <h3>Do you offer warranty on parts?</h3>
                    <p>Yes, all our parts come with manufacturer warranty and our own service guarantee.</p>
                </div>
                <div class="faq-item">
                    <h3>Can I return purchased items?</h3>
                    <p>We offer a 30-day return policy on unopened items in original packaging.</p>
                </div>
            </div>
        </div>

        <div class="question-form-section">
            <h2>Still Have Questions?</h2>
            <p>Send us your question and we'll get back to you within 24 hours</p>
            
            <form action="../control/submit_question.php" method="POST" class="question-form">
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="question">Your Question:</label>
                    <textarea id="question" name="question" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="submit-button">Submit Question</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
