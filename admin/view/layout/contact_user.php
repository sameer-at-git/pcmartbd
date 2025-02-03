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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "search") {
    $query = isset($_POST['query']) ? $_POST['query'] : '';
    $users = $db->getUsersByTypeOrEmail($conn, $query);
    
    $response = array();
    if ($users && $users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            $response[] = array(
                'email' => $row['email'],
                'user_id' => $row['user_id'],
                'user_type' => $row['user_type']
            );
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Users - PCMartBD Admin</title>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/layout.css">
</head>
<body>
<div class="header">
    <div class="logo-container">
        <img src="../../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
        <a href="home.php" class="website-name"><p>PCMartBD</p></a>
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
                    <td><a href="home.php">Home</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="broadcast.php">Broadcast</a></td>
                    <td><a href="contact_user.php" class="active">Contact User</a></td>
                    <td><a href="../functions/reviews.php">Reviews</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content">
        <h2>Contact Users</h2>
        
        <div id="errorMessages"></div>

        <fieldset>
            <form action="../../control/contact_control.php" method="POST" onsubmit="return validateForm()">
                <table>
                    <tr>
                        <td>Select User Type:</td>
                        <td>
                            <select id="userType" name="userType">
                                <option value="">Select Type</option>
                                <option value="Customer">Customer</option>
                                <option value="Technician">Technician</option>
                                <option value="Employee">Employee</option>
                            </select>
                            <div id="typeError" class="error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Search User:</td>
                        <td>
                            <input type="text" id="searchUser" name="email" placeholder="Search by email" onkeyup="searchUsers()">
                            <div id="emailError" class="error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject:</td>
                        <td>
                            <input type="text" id="subject" name="subject" placeholder="Enter message subject">
                            <div id="subjectError" class="error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Message:</td>
                        <td>
                            <textarea id="message" name="message" rows="5" placeholder="Type your message here"></textarea>
                            <div id="messageError" class="error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo "<div class='alert'>" . $_SESSION['message'] . "</div>";
                                unset($_SESSION['message']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" id="selectedUserId" name="userId">
                            <input type="hidden" id="selectedUserEmail" name="userEmail">
                            <input type="submit" value="Send Message">
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>

        <div id="searchResults"></div>
    </div>
    <div class="footer">
        <p>&copy; 2024 PCMartBD. All rights reserved.</p>
    </div>
    <script src="../../js/contact_ajax.js"></script>
</body>
</html>

<?php
$db->closeCon($conn);
?>
