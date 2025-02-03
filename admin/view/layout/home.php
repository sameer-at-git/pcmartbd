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
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/tech.svg'],
        'Manage Employees' => ['url' => '../functions/manage_employee.php', 'icon' => '../../images/employee-icon.svg'],
        'Search Product' => ['url' => '../functions/search_products.php', 'icon' => '../../images/product-icon.svg'],
        'Manage Admin' => ['url' => '../functions/manage_admin.php', 'icon' => '../../images/admin-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg'],
        'Check Messages' => ['url' => 'messages.php', 'icon' => '../../images/message-solid.svg'],
        'Broadcast' => ['url' => 'broadcast.php', 'icon' => '../../images/bullhorn-solid.svg'],
        'Contact Users' => ['url' => 'contact_user.php', 'icon' => '../../images/user.svg'],
        'Add Admin ' => ['url' => '../sign_up/admin_registration.php', 'icon' => '../../images/admin.svg'],
        'Add Employee' => ['url' => '../sign_up/employee_registration.php', 'icon' => '../../images/employee.svg'],
        'Check All Reviews' => ['url' => '../functions/reviews.php', 'icon' => '../../images/comment-solid.svg']
    ],
    'Employee Control' => [
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/tech.svg'],
        'Manage Employees' => ['url' => '../functions/manage_employee.php', 'icon' => '../../images/employee-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg'],
        'Check Messages' => ['url' => 'messages.php', 'icon' => '../../images/message-solid.svg'],
        'Broadcast' => ['url' => 'broadcast.php', 'icon' => '../../images/bullhorn-solid.svg'],
        'Contact Users' => ['url' => 'contact_user.php', 'icon' => '../../images/user.svg'],
        'Add Admin ' => ['url' => '../sign_up/admin_registration.php', 'icon' => '../../images/admin.svg'],
        'Add Employee' => ['url' => '../sign_up/employee_registration.php', 'icon' => '../../images/employee.svg'],
        'Check All Reviews' => ['url' => '../functions/reviews.php', 'icon' => '../../images/comment-solid.svg']

    ],
    'Product Control' => [
        'Manage Technician' => ['url' => '../functions/manage_technician.php', 'icon' => '../../images/tech.svg'],
        'Search Product' => ['url' => '../functions/search_products.php', 'icon' => '../../images/product-icon.svg'],
        'Manage Customers' => ['url' => '../functions/manage_customers.php', 'icon' => '../../images/customer-icon.svg'],
        'See All Appointments' => ['url' => '../functions/appointments.php', 'icon' => '../../images/appointment-icon.svg'],
        'Check Messages' => ['url' => 'messages.php', 'icon' => '../../images/message-solid.svg'],
        'Broadcast' => ['url' => 'broadcast.php', 'icon' => '../../images/bullhorn-solid.svg'],
        'Contact Users' => ['url' => 'contact_user.php', 'icon' => '../../images/user.svg'],
        'Add Admin ' => ['url' => '../sign_up/admin_registration.php', 'icon' => '../../images/admin.svg'],
        'Add Employee' => ['url' => '../sign_up/employee_registration.php', 'icon' => '../../images/employee.svg'],
        'Check All Reviews' => ['url' => '../functions/reviews.php', 'icon' => '../../images/comment-solid.svg']

    ]
];
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);
?>
<html>

<head>
    <title>Home - Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <script src="../../js/home.js"></script>

</head>

<body>
    <div class="header">
        <div class="logo-container">
            <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
        <div class="admin-info">
            <a href="profile.php" class="admin-link">
                <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
                <div class="admin-name"><?php echo $userInfo['name']; ?></div>
            </a>
        </div>
    </div>
    <div class="navbar">
        <div>
            <table>
                <tr>
                    <td><a href="home.php" class="active">Home</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="broadcast.php" >Broadcast</a></td>
                    <td><a href="contact_user.php">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="content">
        <div class="content-header">
            <h2>Admin Functionalities</h2>
            <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchFunctionality()" placeholder="Search...">
            <button class="search-btn">
                    <img src="../../images/search.svg" alt="Search" class="search-icon">
                </button>
            </div>
        </div>
        <div class="content-section">
            <div class="functionalities-grid">
                <?php
                foreach ($adminPages[$admin_type] as $title => $details) {
                    $className = str_replace(' ', '', strtolower($title));
                    echo "<div class='function-card {$className}'>";
                    echo "<img src='{$details['icon']}' alt='{$title} icon'>";
                    echo "<h3> <a href='{$details['url']}'>{$title}</a></h3>";
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