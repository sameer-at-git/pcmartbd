<?php
session_start();

if (!isset($_SESSION['emp_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/view/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['emp_id'];
$emp_type = $_SESSION['user_access'];
$name = $db->showUserbyID($id, $conn);
$_SESSION['user_name'] = $name->fetch_assoc()['f_name'];
$total_faq = $db->getTotalFAQ($conn);
$faq_count = $total_faq->fetch_assoc()['total_faq'];

if ($emp_type == 'Full') {
?>


    <html>

    <head>
        <title>Employee Home</title>
        <link rel="stylesheet" href="../../css/layout.css">
    </head>

    <body>
        <div class="header">
            <div class="logo-container">
                <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
                <a href="home.php" class="website-name">
                    <p>PCMartBD</p>
                </a>
            </div>
        </div>
        <div class="navbar">
            <div>
                <table>
                    <tr>
                        <td><a href="home.php" class="active">Home</a></td>
                        <td><a href="product.php">Products</a></td>
                        <td><a href="reviews.php">Reviews</a></td>
                        <td><a href="profile.php">Profile</a></td>
                        <td><a href="../../control/sessionout.php">Logout</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="content">
            <div class="content-employee">
                <h3>Welcome <?php echo $_SESSION['user_name']; ?></h3>
            </div>
            <div class="content">
                <div class="content-section">
                    <h2>Functionalities</h2>


                    <?php

                    $emp = $db->totalEmployee($conn);
                    $emp_count = $emp->fetch_assoc()['total_employee'];
                    ?>


                    <div class="functionalities-grid">
                        <div class="func-grid">
                            <h3><a href="../functions/show_employee.php">Total Employee <p><?php echo $emp_count; ?></p></a></h3>
                            <h3><a href="../functions/allFAQ.php">All Questions</a></h3>
                            <h3><a href="../functions/unAsnweredFAQ.php">Unasnwered Questions <p><?php echo $faq_count; ?></p></a></h3>
                            <h3><a href="../functions/allTechnicianReport.php">All Technitian Reports</a></h3>
                            <h3><a href="../functions/technicianReport.php">Unresponded Reports</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
?>
    <html>

    <head>
        <title>Employee Home</title>
        <link rel="stylesheet" href="../../css/layout.css">
    </head>

    <body>
        <div class="header">
            <div class="logo-container">
                <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
                <a href="full_home.php" class="website-name">
                    <p>PCMartBD</p>
                </a>
            </div>
        </div>
        <div class="navbar">
            <div>
                <table>
                    <tr>
                        <td><a href="full_home.php" class="active">Home</a></td>
                        <td><a href="product.php">Products</a></td>
                        <td><a href="reviews.php">Reviews</a></td>
                        <td><a href="profile.php">Profile</a></td>
                        <td><a href="../../control/sessionout.php">Logout</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="content">
            <div class="content-employee">
                <h3>Welcome <?php echo $_SESSION['user_name']; ?></h3>
            </div>
            <div class="content">
                <div class="content-section">
                    <h2>Functionalities</h2>


                    <?php

                    $emp = $db->totalEmployee($conn);
                    $emp_count = $emp->fetch_assoc()['total_employee'];
                    ?>


                    <div class="functionalities-grid">
                        <div class="func-grid">
                            <h3><a href="../functions/allFAQ.php">All Questions</a></h3>
                            <h3><a href="../functions/unAsnweredFAQ.php">Unasnwered Questions <p><?php echo $faq_count; ?></p></a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
}
?>