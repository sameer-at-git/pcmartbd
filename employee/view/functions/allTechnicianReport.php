<?php
session_start();
$id = $_SESSION['emp_id'];

include '../../model/db.php';
$db = new myDB();
$conn = $db->openCon();
$reports = $db->allTechnicianReports($conn);
?>

<html>

<head>
    <title>Technician Report</title>
    <link rel="stylesheet" href="../../css/showStyle.css">
</head>

<body>
    <div class="outer-container">
        <a href="../layout/full_home.php" class="back-button">← Back to Home</a>
        <h2>Technician Reports</h2>
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
                <h4 class="priority">
                    Priority Level: <?php echo $report['priority']; ?>
                </h4>
                <p class="report-message">
                    <?php echo $report['message']; ?>
                </p>
                <p class="response-message">
                    <?php
                    if ($report['emp_response'] == "") {
                        echo "No response yet";
                    } else {
                        echo "Response: " . $report['emp_response'];
                    } ?>
                </p>
            </div>
        <?php } ?>
        <br>
        <a href="technicianReport.php" class="submit-btn">Respond to Reports</a>
    </div>
</body>

</html>