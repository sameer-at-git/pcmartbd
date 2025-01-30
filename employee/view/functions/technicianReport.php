<?php
session_start();
$id = $_SESSION['emp_id'];

include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$reports = $db->technicianReports($conn);

if (isset($_POST['submit'])) {
    $report_id = $_POST['report_id'];
    $report_response = $_POST['report_response'];
    $db->addReportResponse($report_id, $report_response, $conn);
    header('Location: technicianReport.php');
}
?>

<html>

<head>
    <title>Technician Report</title>
    <link rel="stylesheet" href="../../css/showStyle.css">
</head>

<body>
    <a href="../layout/full_home.php" class="back-button">← Back to Home</a>
    <h2>Unresponded Technician Reports</h2>
    <?php while ($report = $reports->fetch_assoc()) {
        $tech_id = $report['technician_id'];
        $tech_name = $db->getTechnicianName($tech_id, $conn);
        $t_name = $tech_name->fetch_assoc();
    ?>
        <div class="container">
            <h3><?php echo $report['subject']; ?></h3>
            <p class="report-info">
                Reported by: <?php echo $t_name['first_name'] . " " . $t_name['last_name']; ?>
                <br>
                Date: <?php echo $report['sent_date']; ?>
            </p>
            <p class="priority">
                Priority Level: <?php echo $report['priority']; ?>
            </p>
            <p class="report-message">
                <?php echo $report['message']; ?>
            </p>

            <form method="POST" action="">
                <input type="text" class="report-response" name="report_response" placeholder="Enter your response here...">

                <br><br>
                <input type="hidden" name="report_id" value="<?php echo $report['r_id']; ?>">
                <input type="submit" name="submit" value="Submit Response" class="submit-btn">
            </form>
        </div>
    <?php } ?>
    <br>
</body>

</html>