<?php
include '../model/db.php';

function validateEmail($email) {
    if (empty(trim($email))) {
        return "Email field cannot be empty.";
    }
    
    if (!strpos($email, '@') || !strpos($email, '.')) {
        return "Please enter a valid email address with @ and .";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Please enter a valid email address.";
    }
    
    return "";
}

function validatePassword($password) {
    if (empty(trim($password))) {
        return "Password field cannot be empty.";
    }
    return "";
}

$db = new UserDB();
$conn = $db->openCon();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $emailError = validateEmail($email);
    $passwordError = validatePassword($password);

    if (!empty($emailError)) {
        echo $emailError;
        exit();
    }

    if (!empty($passwordError)) {
        echo $passwordError;
        exit();
    }

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
                    header("Location: ../../admin/view/layout/home.php");
                    break;
                case 'Customer':
                    $customer_id = $db->getCustomerIdByEmail($email, $conn);
                    if ($customer_id) {
                        $_SESSION['customer_id'] = $customer_id;
                    }
                    header("Location: ../../customer/view/browse.php");
                    break;
                case 'Technician':
                    $technician_id = $db->getTechnicianIdByEmail($email, $conn);
                    if ($technician_id) {
                        $_SESSION['technician_id'] = $technician_id;
                    }
                    header("Location: ../../technician/view/layout/home.php");
                    break;
                case 'Employee':
                    $emp_id = $db->getEmpIdByEmail($email, $conn);
                    if ($emp_id) {
                        $_SESSION['emp_id'] = $emp_id;
                    }
                    header("Location: ../../employee/view/layout/full_home.php");
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