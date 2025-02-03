<?php
session_start();


include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['edit'])) {
    $emp_id = $_POST['emp_id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $pre_add = $_POST['pre_add'];
    $per_add = $_POST['per_add'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];

    
    $db->updateEmployee( $emp_id, $f_name, $l_name, $phone, $dob, $pre_add, $per_add, $password, $conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Show all Employee</title>
    <link rel="stylesheet" href="../../css/showStyle.css">
</head>

<body>
    <div class="container">
        <a href="../layout/full_home.php" class="back-button">← Back to Home</a>
        <h2>List of Employees</h2>
        <div class="table-wrapper">
            <?php
            $result = $db->showEmployee($conn);
            if ($result->num_rows > 0) {
            ?>
                <table class="manage-table">
                    <tr>
                        <th class="id-column">ID</th>
                        <th>Name</th>
                        <th class="phone-column">Phone</th>
                        <th class="email-column">Email</th>
                        <th>Gender</th>
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
                                <td><?php echo $row["email"]; ?></td>
                                <td>
                                    <?php echo $row["gender"]; ?>
                                </td>
                                <td><input type="text" name="pre_add" value="<?php echo $row["pre_add"]; ?>" class="input-field"></td>
                                <td>
                                    <?php
                                    if($row["employment"] == "Full"){
                                        echo "Full-Time";
                                    }
                                    elseif($row["employment"] == "Part"){
                                        echo "Part-Time";
                                    }
                                    else{
                                        echo "Internship";
                                    }
                                    ?>
                                </td>
                                <td class="action-buttons">
                                    <input type="hidden" name="emp_id" value="<?php echo $row["emp_id"]; ?>">
                                    <input type="hidden" name="per_add" value="<?php echo $row["per_add"]; ?>">
                                    <input type="hidden" name="password" value="<?php echo $row["password"]; ?>">
                                    <input type="hidden" name="dob" value="<?php echo $row["dob"]; ?>">
                                    <input type="submit" class="edit-btn" name="edit" value="Edit" >
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            <?php
            } else {
                echo "<p class='no-results'>No employees found</p>";
                $db->closeCon($conn);
            }
            ?>
        </div>
    </div>
</body>

</html>