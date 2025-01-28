<?php
session_start();

if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/view/login.php');
    exit();
}
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['admin_id'];
$admin_type = $_SESSION['user_access'];

$adminPages = [
    'Full Control' => [
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/technician-icon.svg'],
        'Manage Employees' => ['url' => '../functions/manage_employee.php', 'icon' => '../../images/employee-icon.svg'],
        'Manage Product' => ['url' => '../functions/manage_products.php', 'icon' => '../../images/product-icon.svg'],
        'Manage Admin' => ['url' => '../functions/manage_admin.php', 'icon' => '../../images/admin-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg']
    ],
    'Employee Control' => [
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/technician-icon.svg'],
        'Manage Employees' => ['url' => '../functions/manage_employee.php', 'icon' => '../../images/employee-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg']
    ],
    'Product Control' => [
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/technician-icon.svg'],
        'Manage Product' => ['url' => '../functions/manage_products.php', 'icon' => '../../images/product-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg']
    ]
];
?>
<html>
<head>
    <title>Home - Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
<div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name"><p>PCMartBD</p></a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php" class="active">Home</a></td>
                    <td><a href="dashboard.php">Dashboard</a></td>
                    <td><a href="messages.php">Messages</a></td>
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
                foreach ($adminPages[$admin_type] as $title => $details) {
                    $className = str_replace(' ', '', strtolower($title));
                    echo "<div class='function-card {$className}'>";
                    echo "<img src='{$details['icon']}' alt='{$title} icon'>";
                    echo "<h3><a href='{$details['url']}'>{$title}</a></h3>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
</body>
</html>