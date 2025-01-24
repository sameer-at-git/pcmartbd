<?php
session_start();

if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['admin_id'];
$admin_type = $_SESSION['user_access'];

$adminPages = [
    'Full Control' => [
        'Manage Technician' => '../functions/manage_technician.php',
        'Manage Employees' => '../functions/manage_employee.php',
        'Manage Product' => '../functions/manage_products.php',
        'Manage Admin' => '../functions/manage_admin.php',
        'Manage Customers' => '../functions/manage_customers.php',
        'See All Appointments' => '../functions/manage_appointments.php'
    ],
    'Employee Control' => [
        'Manage Technician' => '../ functions/manage_technician.php',
        'Manage Employees' => '../functions/manage_employee.php',
        'Manage Customers' => '../functions/manage_customers.php',
        'See All Appointments' => '../functions/manage_appointments.php'
    ],
    'Product Control' => [
        'Manage Technician' => '../functions/manage_technician.php',
        'Manage Product' => '../functions/manage_products.php',
        'Manage Customers' => '../functions/manage_customers.php',
        'See All Appointments' => '../functions/manage_appointments.php'
    ]
];
?>
<html>

<head>
    <title>Admin Home</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php" class="active">Home</a></td>
                    <td><a href="dashboard.php">Dashboard</a></td>
                    <td><a href="notifications.php">Notifications</a></td>
                    <td><a href="profile.php">Profile</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="content">
        <div class="content-section">
            <h2>Admin Functionalities</h2>
            <div class="functionalities-grid">
                <?php
                foreach ($adminPages[$admin_type] as $title => $url) {
                    $className = str_replace(' ', '', strtolower($title));
                    echo "<div class='function-card {$className}'>";
                    echo "<h3><a href='$url'>$title</a></h3>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>