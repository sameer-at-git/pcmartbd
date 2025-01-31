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
if (isset($_POST['edit'])) {
    if ($db->updateTechnician(
        $conn,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['experience'],
        $_POST['work_area'],
        $_POST['work_hour']
    )) {
        echo "Technician information updated successfully!";
    } else {
        echo "Error updating technician: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $email = $_POST['email'];
    
    if ($db->deleteTechnician($conn, $email)) {
        echo "Technician deleted successfully!";
    } else {
        echo "Error deleting technician: " . $conn->error;
    }
}

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
                    <td><a href="../layout/dashboard.php" >Dashboard</a></td>
                    <td><a href="../layout/messages.php">Messages</a></td>
                    <td><a href="../layout/update_profile.php">Account</a></td>
                    <td><a href="../layout/contact_admin.php" >Contact Admin</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tec-container">
    <h2>Manage Technicians</h2>
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
                <th>Actions</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <form method="post" class="tec-manage-form">
                    <tr>
                        <td class="tec-id-column"><?php echo $row["technician_id"]; ?></td>
                        <td class="tec-name-inputs"><input class="tec-input-field" type="text" name="first_name" value="<?php echo $row["first_name"]; ?>"> <input class="tec-input-field" type="text" name="last_name" value="<?php echo $row["last_name"]; ?>"></td>
                        <td class="tec-work-hours-column">
                            <select name="work_hour">
                                <option value="Slot-1" <?php echo ($row["work_hour"] == "Slot-1") ? "selected" : ""; ?>>Slot-1</option>
                                <option value="Slot-2" <?php echo ($row["work_hour"] == "Slot-2") ? "selected" : ""; ?>>Slot-2</option>
                                <option value="Slot-3" <?php echo ($row["work_hour"] == "Slot-3") ? "selected" : ""; ?>>Slot-3</option>
                                <option value="Slot-4" <?php echo ($row["work_hour"] == "Slot-4") ? "selected" : ""; ?>>Slot-4</option>
                            </select>
                        </td class="tec-id-column">
                        <td class="tec-phone-column"><input class="tec-input-field" type="text" name="phone" value="<?php echo $row["phone"]; ?>"></td>
                        <td class="tec-id-column"><p><?php echo $row["email"]; ?></p></td>
                        <td class="tec-id-column">
                            <select class="tec-work-area-select" name="work_area">
                                <option value="Farmgate" <?php echo ($row["work_area"] == "Farmgate") ? "selected" : ""; ?>>Farmgate</option>
                                <option value="Gulshan" <?php echo ($row["work_area"] == "Gulshan") ? "selected" : ""; ?>>Gulshan</option>
                                <option value="Jatrabari" <?php echo ($row["work_area"] == "Jatrabari") ? "selected" : ""; ?>>Jatrabari</option>
                                <option value="Khilgaon" <?php echo ($row["work_area"] == "Khilgaon") ? "selected" : ""; ?>>Khilgaon</option>
                                <option value="Mirpur" <?php echo ($row["work_area"] == "Mirpur") ? "selected" : ""; ?>>Mirpur</option>
                                <option value="Mohammadpur" <?php echo ($row["work_area"] == "Mohammadpur") ? "selected" : ""; ?>>Mohammadpur</option>
                                <option value="Motijheel" <?php echo ($row["work_area"] == "Motijheel") ? "selected" : ""; ?>>Motijheel</option>
                                <option value="Rampura" <?php echo ($row["work_area"] == "Rampura") ? "selected" : ""; ?>>Rampura</option>
                                <option value="Shahbagh" <?php echo ($row["work_area"] == "Shahbagh") ? "selected" : ""; ?>>Shahbagh</option>
                                <option value="Shantinagar" <?php echo ($row["work_area"] == "Shantinagar") ? "selected" : ""; ?>>Shantinagar</option>
                                <option value="Tejgaon" <?php echo ($row["work_area"] == "Tejgaon") ? "selected" : ""; ?>>Tejgaon</option>
                                <option value="Uttara" <?php echo ($row["work_area"] == "Uttara") ? "selected" : ""; ?>>Uttara</option>
                            </select>
                        </td>
                        <td class="tec-id-column"><input class="tec-experience-input" type="text" name="experience" value="<?php echo $row["experience"]; ?>"></td>
                        <td class="tec-action-buttons">
                            <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                            <input type="submit" class="tec-btn-edit" name="edit" value="Edit">
                            <input type="submit" class="tec-btn-delete" name="delete" value="Delete">
                        </td>
                    </tr>
                </form>
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