<?php
session_start();
$id = $_SESSION['emp_id'];

include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$faqs = $db->unAnsweredFAQ($conn);

if (isset($_POST['submit'])) {
    $faq_id = $_POST['faq_id'];
    $report_response = $_POST['report_response'];
    $db->addFaqResponse($faq_id, $report_response, $conn);
    header('Location: allFAQ.php');
}
?>

<html>

<head>
    <title>Technician Report</title>
    <link rel="stylesheet" href="../../css/showStyle.css">
    <script src="../../js/answer.js"></script>
</head>

<body>
    <div class="outer-container">
        <a href="../layout/full_home.php" class="back-button">← Back to Home</a>
        <h2>Unresponded Technician Reports</h2>
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
                <form method="POST" action="" onsubmit="return validateResponse(<?php echo $faq['faqID']; ?>)">
                    <input type="text" class="report-response" id="report_response<?php echo $faq['faqID']; ?>" name="report_response" placeholder="Enter your response here...">
                    <p class="error" id="response_error<?php echo $faq['faqID']; ?>"></p>
                    <br><br>
                    <input type="hidden" name="faq_id" value="<?php echo $faq['faqID']; ?>">
                    <input type="submit" name="submit" value="Submit Response" class="submit-btn">
                </form>
            </div>
        <?php } ?>
        <br>
    </div>
</body>

</html>