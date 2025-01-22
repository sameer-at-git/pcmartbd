<?php
session_start();
if (!isset($_SESSION['user_access']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();

if (isset($_POST['edit'])) {
    $emp_id = $_POST['emp_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $pre_add = $_POST['pre_add'];
    $per_add = $_POST['per_add'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $employment = $_POST['employment'];

    if ($db->updateEmployee($emp_id, $f_name, $l_name, $phone, $email, $dob, $pre_add, $per_add, $gender, $marital_status, $employment)) {
        echo "<script>alert('Employee information updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating employee!');</script>";
    }
}

if (isset($_POST['delete'])) {
    $emp_id = $_POST['emp_id'];
    if ($db->deleteEmployee($emp_id)) {
        echo "<script>alert('Employee deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting employee!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Employee</title>
    <link rel="stylesheet" href="../../css/managestyle.css">

    <style>
        .id-column {
            width: 60px;
        }
        .manage-table td:first-child {
            width: 60px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Employee</h2>
        <a href="../admin_home.php" class="back-button">← Back to Dashboard</a>
        <div class="table-wrapper">
            <?php
            $result = $db->getAllEmployees();
            if ($result->num_rows > 0) {
            ?>
                <table class="manage-table">
                    <tr>
                        <th class="id-column">ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Present Address</th>
                        <th>Employment</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <form method="post" class="manage-form">
                            <tr>
                                <td class="id-column"><?php echo $row["emp_id"]; ?></td>
                                <td>
                                    <input type="text" name="f_name" value="<?php echo $row["f_name"]; ?>" class="input-field">
                                    <input type="text" name="l_name" value="<?php echo $row["l_name"]; ?>" class="input-field">
                                </td>
                                <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>" class="input-field"></td>
                                <td><input type="text" name="email" value="<?php echo $row["email"]; ?>" class="input-field"></td>
                                <td>
                                    <select name="gender" class="input-field">
                                        <option value="Male" <?php echo ($row["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="Female" <?php echo ($row["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                    </select>
                                </td>
                                <td><input type="date" name="dob" value="<?php echo $row["dob"]; ?>" class="input-field"></td>
                                <td><input type="text" name="pre_add" value="<?php echo $row["pre_add"]; ?>" class="input-field"></td>
                                <td>
                                    <select name="employment" class="input-field">
                                        <option value="Full" <?php echo ($row["employment"] == "Full") ? "selected" : ""; ?>>Full</option>
                                        <option value="Part" <?php echo ($row["employment"] == "Part") ? "selected" : ""; ?>>Part</option>
                                        <option value="Intern" <?php echo ($row["employment"] == "Intern") ? "selected" : ""; ?>>Intern</option>
                                    </select>
                                </td>
                                <td class="action-buttons">
                                    <input type="hidden" name="emp_id" value="<?php echo $row["emp_id"]; ?>">
                                    <input type="hidden" name="per_add" value="<?php echo $row["per_add"]; ?>">
                                    <input type="hidden" name="marital_status" value="<?php echo $row["marital_status"]; ?>">
                                    <input type="submit" name="edit" value="Edit" class="btn-edit">
                                    <input type="submit" name="delete" value="Delete" class="btn-delete" onclick="return confirm('Are you sure you want to delete this employee?');">
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            <?php
            } else {
                echo "<p class='no-results'>No employees found</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>