<?php
// Admin contact details - you should replace these with actual admin details
$admin_email = "admin@example.com";
$admin_phone = "+1234567890";
$admin_whatsapp = "+1234567890";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    
    // Email headers
    $headers = "From: " . $user_email . "\r\n";
    $headers .= "Reply-To: " . $user_email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email to admin
    mail($admin_email, $subject, $message, $headers);
    
    // Redirect or show success message
    $success_message = "Your message has been sent successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="css/contact_admin.css">
</head>
<body>
    <h1>Contact Admin</h1>
    
    <?php if (isset($success_message)): ?>
        <div class="success-message">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <div class="contact-container">
        <div class="contact-methods">
            <h2>Direct Contact Methods</h2>
            <p>
                <strong>Email:</strong> 
                <a href="mailto:<?php echo $admin_email; ?>"><?php echo $admin_email; ?></a>
            </p>
            <p>
                <strong>Phone:</strong> 
                <a href="tel:<?php echo $admin_phone; ?>"><?php echo $admin_phone; ?></a>
            </p>
            <p>
                <strong>WhatsApp:</strong> 
                <a href="https://wa.me/<?php echo str_replace('+', '', $admin_whatsapp); ?>" target="_blank">
                    Chat on WhatsApp
                </a>
            </p>
        </div>

        <div class="contact-form">
            <h2>Send Message</h2>
            <form method="POST" action="">
                <div>
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div>
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>

                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                </div>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html>
