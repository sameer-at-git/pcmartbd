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
    <title>Help Center - PCMartBD</title>
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
                <h2>Help Center</h2>
            </div>

            <div class="help-center-container">
                <!-- Search Section -->
                <div class="search-section">
                    <div class="search-box">
                        <input type="text" id="faqSearch" placeholder="Search FAQs...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>

                <!-- FAQ Categories -->
                <div class="faq-categories">
                    <button class="category-btn active" data-category="all">All</button>
                    <button class="category-btn" data-category="account">Account</button>
                    <button class="category-btn" data-category="appointments">Appointments</button>
                    <button class="category-btn" data-category="payments">Payments</button>
                    <button class="category-btn" data-category="services">Services</button>
                </div>

                <!-- FAQ Section -->
                <div class="faq-section">
                    <div class="faq-item" data-category="account">
                        <div class="faq-question">
                            <h3>How do I update my profile information?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To update your profile information:</p>
                            <ol>
                                <li>Go to Settings</li>
                                <li>Click on "Edit Profile Information"</li>
                                <li>Update your details</li>
                                <li>Click Save Changes</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item" data-category="appointments">
                        <div class="faq-question">
                            <h3>How do I manage my appointment schedule?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>You can manage your appointments through the dashboard:</p>
                            <ul>
                                <li>View upcoming appointments</li>
                                <li>Accept or reschedule appointments</li>
                                <li>Set your availability</li>
                                <li>View appointment history</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item" data-category="payments">
                        <div class="faq-question">
                            <h3>How and when do I receive my payments?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Payments are processed weekly and transferred directly to your registered bank account. You can track your earnings through the dashboard's payment section.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="services">
                        <div class="faq-question">
                            <h3>What should I do if I can't complete a service?</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>If you're unable to complete a service:</p>
                            <ol>
                                <li>Contact the customer immediately</li>
                                <li>Notify admin through the contact form</li>
                                <li>Provide a detailed explanation</li>
                                <li>Wait for further instructions</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Contact Support Section -->
                <div class="support-section">
                    <h3>Still need help?</h3>
                    <p>Contact our support team for assistance</p>
                    <a href="contactAdmin.php" class="support-button">
                        <i class="fas fa-headset"></i>
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>

    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
            });
        });

        // Search Functionality
        document.getElementById('faqSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.faq-item').forEach(item => {
                const question = item.querySelector('h3').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                const isVisible = question.includes(searchTerm) || answer.includes(searchTerm);
                item.style.display = isVisible ? 'block' : 'none';
            });
        });

        // Category Filter
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.dataset.category;
                
                // Update active button
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Filter FAQ items
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
