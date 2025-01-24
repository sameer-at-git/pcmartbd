<?php
include 'db.php';

$db = new UserDB();
$conn = $db->openCon();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['useremail'];
    $password = $_POST['userpass'];

    $user = $db->getUserByEmail($email, $conn);

    if ($user) {
        if ($db->checkPassword($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['user_access'] = $user['subtype']; 
            switch ($user['user_type']) {
                case 'Admin':
                    $admin_id = $db->getAdminIdByEmail($email, $conn);
                    if ($admin_id) {
                        $_SESSION['admin_id'] = $admin_id;
                    }
                    header("Location: ../admin/view/layout/home.php");
                    break;
                case 'Customer':
                    header("Location: customer_dashboard.php");
                    break;
                case 'Technician':
                    header("Location: technician_dashboard.php");
                    break;
                case 'Employee':
                    header("Location: employee_dashboard.php");
                    break;
                default:
                    echo "Invalid user type.";
                    break;
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with the provided email.";
    }
}

$db->closeCon($conn);
?>
