<?php
session_start();

if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../layout/login.php');
    exit();
}
include('../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$id = $_SESSION['user_id'];
$admin_type = $_SESSION['user_access'];

// Define admin permissions structure
$adminPermissions = [
    'Full Control' => [
        'manage_technician' => true,
        'manage_employees' => true,
        'manage_products' => true,
        'manage_admin' => true,
        'manage_customers' => true
    ],
    'Employee Control' => [
        'manage_technician' => true,
        'manage_employees' => true,
        'manage_products' => false,
        'manage_admin' => false,
        'manage_customers' => true
    ],
    'Product Control' => [
        'manage_technician' => true,
        'manage_employees' => false,
        'manage_products' => true,
        'manage_admin' => false,
        'manage_customers' => false
    ]
];

// Define menu items structure
$menuItems = [
    'manage_technician' => [
        'title' => 'Manage Technician',
        'url' => 'functions/manage_technician.php'
    ],
    'manage_employees' => [
        'title' => 'Manage Employees',
        'url' => 'functions/manage_employee.php'
    ],
    'manage_products' => [
        'title' => 'Manage Product',
        'url' => 'functions/manage_products.php'
    ],
    'manage_admin' => [
        'title' => 'Manage Admin',
        'url' => 'functions/manage_admin.php'
    ],
    'manage_customers' => [
        'title' => 'Manage Customers',
        'url' => 'functions/manage_customers.php'
    ]
];
?>
<html>

<head>
    <title>Admin Home</title>
    <link rel="stylesheet" href="../css/homestyle.css">

</head>

<body>
  <div class="all"> <div class="superlative"> <div>
        <table>
            <tr>
                <td><a href="home.php">Home</a></td>
                <td><a href="admin_home.php" class="active">Dashboard</a></td>
                <td><a href="notifications.php">Notifications</a></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="../control/sessionout.php">Logout</a></td>
            </tr>
        </table>
</div>
     <br>
    <fieldset class="dashboard">
        
            <section id="currentstat">
                <h3>Current Stat</h3>
        
        <ol>
            <li>Total Admins: <?php echo $db->getTotalCount('admin', $conn); ?></li>
            <li>Total Employees: <?php echo $db->getTotalCount('employee', $conn); ?></li>
            <li>Total Technicians: <?php echo $db->getTotalCount('technician', $conn); ?></li>
            <li>Total Customers: <?php echo $db->getTotalCount('customer', $conn); ?></li>
            <li>Total Products: <?php echo $db->getTotalCount('product', $conn); ?></li>
            <li>Total Orders: <?php echo $db->getTotalCount("orders", $conn); ?></li>
            <li>Total Revenue: <?php echo $db->getTotalRevenue($conn); ?></li>
        </ol>
    </fieldset>
    </section>
    </fieldset>
    <legend>
        <h2>Admin Functionalities</h2>
    </legend><div class="manage">
    <section id="functionalities">
        <?php
        // Display menu items based on permissions
        foreach ($menuItems as $key => $item) {
            if ($adminPermissions[$admin_type][$key] ?? false) {
                echo "<section id='{$key}'>";
                echo "<h3><a href='{$item['url']}'>{$item['title']}</a></h3>";
                echo "</section>";
            }
        }
        ?>
    </section></div>
    </fieldset>
    </div>
    </div></body>

</html>