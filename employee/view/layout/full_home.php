<?php
session_start();

if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    //header('Location: ../../../layout/login.php');
    //exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['emp_id'];
///$emp_type = $_SESSION['emp_access'];
$emp_type = 'Full';
$_SESSION['user_name'] = 'Admin';
$_SESSION['user_id'] = 3;

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
                            <h3><a href="../functions/faq.php">All Questions</a></h3>
                            <h3><a href="../functions/ufaq.php">Unasnwered Questions <p><?php echo $emp_count; ?></p></a></h3>
                            <h3><a href="../functions/showEmployee.php">Appointment Information</a></h3>
                            <h3><a href="../functions/showEmployee.php">Technician Reports</a></h3>
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
                            <h3><a href="../functions/faq.php">All Questions</a></h3>
                            <h3><a href="../functions/ufaq.php">Unasnwered Questions <p><?php echo $emp_count; ?></p></a></h3>
                            <h3><a href="../functions/showEmployee.php">Appointment Information</a></h3>
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