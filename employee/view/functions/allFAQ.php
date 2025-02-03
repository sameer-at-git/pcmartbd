<?php
session_start();
$id = $_SESSION['emp_id'];

include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$faqs = $db->allFAQ($conn);
?>

<html>

<head>
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" href="../../css/showStyle.css">
</head>
<body>
    <div class="outer-container">
        <a href="../layout/full_home.php" class="back-button">← Back to Home</a>
        <h2>Frequently Asked Questions</h2>
        <?php while ($faq = $faqs->fetch_assoc()) {
        ?>
            <div class="container">
                <p class="faq-email">
                    Asked by: <?php echo $faq['email']; ?>
                    <br>
                </p>
                <p class="report-message">
                    <?php echo $faq['question']; ?>
                </p>
                <p class="response-message">
                    <?php
                    if ($faq['answer'] == "") {
                        echo "No Answer yet";
                    } else {
                        echo "Answer: " . $faq['answer'];
                    } ?>
                </p>
            </div>
        <?php } ?>
        <br>
        <a href="unAsnweredFAQ.php" class="submit-btn">Respond to Unanswered Questions</a>
    </div>
</body>

</html>