<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
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
    <title>Manage Admins</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
    <link rel="stylesheet" href="../../css/index.css">
    <script src="../../js/admin_validation.js"></script>
</head>

<body>
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="../layout/home.php" class="website-name"><p>PCMartBD</p></a>
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

    <div class="admin-container">
        <h2 class="admin-header">Manage Admins</h2>
    <a href="../sign_up/admin_registration.php" class="back-button">Add Admin</a>
    <?php
    $result = $db->getAllAdmins($conn);

    if ($result->num_rows > 0) {
    ?>
        <table class="admin-table">
            <thead>
                <tr>
                <th class="id-column">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Access</th>
                <th class="phone-column">Number</th>
                <th>Bio</th>
                <th>Present Address</th>
                <th>Permanent Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $aid=$row['admin_id'];
            ?>
                <form method="post" action="../../control/admin_control.php" id="adminForm_<?php echo $row["admin_id"]; ?>">
                    <tr>
                        <td><?php echo $aid; ?></td>
                        <td>
                            <input type="text" name="name" id="admin_name_<?php echo $aid; ?>" 
                                   value="<?php echo $row["name"]; ?>" 
                                   onkeyup="validateName(<?php echo $aid; ?>)">
                            <div class="error-message" id="nameerr_<?php echo $aid; ?>"></div>
                        </td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <select name="access" id="admin_access_<?php echo $aid; ?>" 
                                    class="access-dropdown" 
                                    onchange="validateAccess(<?php echo $aid; ?>)">
                                <option value="">Select Access Level</option>
                                <option value="Full Control" <?php echo ($row["access"] == "Full Control") ? "selected" : ""; ?>>Full Control</option>
                                <option value="Product Control" <?php echo ($row["access"] == "Product Control") ? "selected" : ""; ?>>Product Control</option>
                                <option value="Employee Control" <?php echo ($row["access"] == "Employee Control") ? "selected" : ""; ?>>Employee Control</option>
                            </select>
                            <div class="error-message" id="accesserr_<?php echo $aid; ?>"></div>
                        </td>
                        <td>
                            <input type="text" name="number" id="admin_phone_<?php echo $aid; ?>" 
                                   value="<?php echo $row["number"]; ?>" 
                                   onkeyup="validatePhone(<?php echo $aid; ?>)">
                            <div class="error-message" id="phoneerr_<?php echo $aid; ?>"></div>
                        </td>
                        <td><input type="text" name="bio" value="<?php echo $row["bio"]; ?>"></td>
                        <td><input type="text" name="presentaddress" value="<?php echo $row["presentaddress"]; ?>"></td>
                        <td><input type="text" name="permanentaddress" value="<?php echo $row["permanentaddress"]; ?>"></td>
                        <td>
                            <input type="hidden" name="admin_id" value="<?php echo $row["admin_id"]; ?>">
                            <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
                            <input type="hidden" name="password" value="<?php echo $row["password"]; ?>">
                            <input type="submit" name="edit" class="btn btn-edit" value="Edit">
                            <input type="submit" name="delete" class="btn btn-delete" value="Delete">
                        </td>
                    </tr>
                </form>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "0 results";
    }

    $db->closeCon($conn);
    ?>

</body>

</html>

