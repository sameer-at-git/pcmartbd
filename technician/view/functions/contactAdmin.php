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
    <title>Contact Admin - PCMartBD</title>
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
                <h2>Contact Admin</h2>
            </div>

            <div class="contact-page-container">
                <!-- New Message Form -->
                <div class="contact-form-container">
                    <h3>Send New Message</h3>
                    <form action="../../control/contactAdmin_control.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <select name="subject" id="subject" required>
                                <option value="">Select a subject</option>
                                <option value="Technical Issue">Technical Issue</option>
                                <option value="Account Problem">Account Problem</option>
                                <option value="Payment Issue">Payment Issue</option>
                                <option value="Service Request">Service Request</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority Level:</label>
                            <select name="priority" id="priority" required>
                                <option value="">Select priority</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Urgent">Urgent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" rows="8" required 
                                placeholder="Please describe your issue in detail..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="attachment">Attachment (optional):</label>
                            <input type="file" name="attachment" id="attachment">
                            <span class="file-info">Max file size: 5MB (PDF, JPG, PNG)</span>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-button">Send Message</button>
                            <button type="reset" class="reset-button">Clear Form</button>
                        </div>
                    </form>
                </div>

                <!-- Chat History Section -->
                <div class="chat-history-container">
                    <h3>Message History</h3>
                    <div class="chat-history">
                        <!-- Example messages - Replace with actual data from database -->
                        <div class="message-card">
                            <div class="message-header">
                                <span class="message-subject">Technical Issue</span>
                                <span class="message-date">March 15, 2024</span>
                                <span class="priority-badge high">High Priority</span>
                            </div>
                            <div class="message-content">
                                <p>Issue with the appointment scheduling system...</p>
                            </div>
                            <div class="message-footer">
                                <span class="status-badge pending">Pending</span>
                                <button class="view-details-btn">View Details</button>
                            </div>
                        </div>

                        <div class="message-card">
                            <div class="message-header">
                                <span class="message-subject">Payment Issue</span>
                                <span class="message-date">March 10, 2024</span>
                                <span class="priority-badge medium">Medium Priority</span>
                            </div>
                            <div class="message-content">
                                <p>Payment not received for last week's services...</p>
                            </div>
                            <div class="message-footer">
                                <span class="status-badge resolved">Resolved</span>
                                <button class="view-details-btn">View Details</button>
                            </div>
                        </div>

                        <div class="message-card">
                            <div class="message-header">
                                <span class="message-subject">Account Problem</span>
                                <span class="message-date">March 5, 2024</span>
                                <span class="priority-badge urgent">Urgent</span>
                            </div>
                            <div class="message-content">
                                <p>Unable to access certain dashboard features...</p>
                            </div>
                            <div class="message-footer">
                                <span class="status-badge in-progress">In Progress</span>
                                <button class="view-details-btn">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>
