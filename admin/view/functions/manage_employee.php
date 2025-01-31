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
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $pre_add = $_POST['pre_add'];
    $gender = $_POST['gender'];
    $employment = $_POST['employment'];
    
    $db->updateEmployee($conn, $f_name, $l_name, $phone, $email, $dob, $pre_add, $gender, $employment);
}

if (isset($_POST['delete'])) {
    $emp_id = $_POST['emp_id'];
    $db->deleteEmployee($conn, $email);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Employee</title>
    <link rel="stylesheet" href="../../css/test.css">
    <link rel="stylesheet" href="../../css/index.css">

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
    <div class="emp-container">
        <h2>Manage Employee</h2>
        <a href="../sign_up/employee_registration.php" class="emp-back-button">Add Employee</a>
        <div class="emp-table-wrapper">
            <?php
            $result = $db->getAllEmployees($conn);
            if ($result->num_rows > 0) {
            ?>
                <table class="emp-manage-table">
                    <tr>
                        <th class="emp-id-column">ID</th>
                        <th>Name</th>
                        <th class="emp-phone-column">Phone</th>
                        <th class="emp-email-column">Email</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Present Address</th>
                        <th>Employment</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <form method="post" class="emp-manage-form">
                            <tr>
                                <td class="emp-id-column"><?php echo $row["emp_id"]; ?></td>
                                <td>
                                    <input type="text" name="f_name" value="<?php echo $row["f_name"]; ?>" class="emp-input-field">
                                    <input type="text" name="l_name" value="<?php echo $row["l_name"]; ?>" class="emp-input-field">
                                </td>
                                <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>" class="emp-input-field"></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td>
                                    <select name="gender" class="emp-input-field">
                                        <option value="Male" <?php echo ($row["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="Female" <?php echo ($row["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                    </select>
                                </td>
                                <td><input type="date" name="dob" value="<?php echo $row["dob"]; ?>" class="emp-input-field"></td>
                                <td><input type="text" name="pre_add" value="<?php echo $row["pre_add"]; ?>" class="emp-input-field"></td>
                                <td>
                                    <select name="employment" class="emp-input-field">
                                        <option value="Full" <?php echo ($row["employment"] == "Full") ? "selected" : ""; ?>>Full</option>
                                        <option value="Part" <?php echo ($row["employment"] == "Part") ? "selected" : ""; ?>>Part</option>
                                        <option value="Intern" <?php echo ($row["employment"] == "Intern") ? "selected" : ""; ?>>Intern</option>
                                    </select>
                                </td>
                                <td class="emp-action-buttons">
                                    <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                                    <input type="submit" name="edit" value="Edit" class="emp-btn-edit">
                                    <input type="submit" name="delete" value="Delete" class="emp-btn-delete">
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            <?php
            } else {
                echo "No employees found";
                $db->closeCon($conn);
            }
            ?>
        </div>
    </div>
</body>

</html>