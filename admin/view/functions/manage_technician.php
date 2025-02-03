<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();
$aid = $_SESSION['admin_id'];
$userInfo = $db->getUserInfo($conn, $aid);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Technicians</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/test.css">

</head>

<body>
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="../layout/home.php" class="website-name">PCMartBD</a>
    </div>
    <div class="admin-info">
        <a href="../layout/profile.php" class="admin-link">
            <img src="<?php echo $userInfo['propic']; ?>" alt="Admin Image" class="admin-image">
            <div class="admin-name"><?php echo $userInfo['name']; ?></div>
        </a>
    </div>
</div>
    <div class="navbar">
        <div>
            <table>
            <tr>
                    <td><a href="../layout/home.php" class="active">Home</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/broadcast.php" >Broadcast</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tec-container">
    <h2>Technician Information</h2>
    <div class="tec-table-wrapper">

    <?php
    $result = $db->getAllTechnicians($conn);

    if ($result->num_rows > 0) {
    ?>
        <table class="tec-manage-table">
            <tr>
                <th class="id-column">ID</th>
                <th>Name</th>
                <th class="work-hours-column">Work-Hour</th>
                <th class="phone-column">Phone</th>
                <th class="email-column">Email</th>
                <th>Work Area</th>
                <th>Experience</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="tec-id-column"><?php echo $row["technician_id"]; ?></td>
                    <td class="tec-name-inputs"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
                    <td class="tec-work-hours-column"><?php echo $row["work_hour"]; ?></td>
                    <td class="tec-phone-column"><?php echo $row["phone"]; ?></td>
                    <td class="tec-id-column"><?php echo $row["email"]; ?></td>
                    <td class="tec-id-column"><?php echo $row["work_area"]; ?></td>
                    <td class="tec-id-column"><?php echo $row["experience"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        echo "0 results";
    }

    $db->closeCon($conn);
    ?>
</div>
</div>
</body>

</html>