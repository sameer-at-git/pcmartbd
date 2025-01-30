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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == "search") {
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $query = isset($_POST['query']) ? $_POST['query'] : '';

        $users = $db->getUsersByTypeOrEmail($conn, $type, $query);
       
        if (empty($users)) { // If the function returns an empty array
            echo "<p>No results found</p>";
            exit;
        }
        
        while ($row = $users->fetch_assoc()) {
            echo "<p onclick=\"selectUser('" . $row['email'] . "', '" . $row['user_id'] . "')\">" . $row['email'] . "</p>";
        }
        
        exit;
    }

    if (isset($_POST['action']) && $_POST['action'] == "send") {
        $user_id = $_POST['user_id'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $result = $db->insertContactUser($conn, $aid, $user_id, $subject, $message);
        echo $result;
        exit;
    }
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
                    <td><a href="dashboard.php">Dashboard</a></td>
                    <td><a href="messages.php">Messages</a></td>
                    <td><a href="update_profile.php">Account</a></td>
                    <td><a href="contact_admin.php" >Contact Admin</a></td>
                    <td><a href="contact_user.php"class="active">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content">
        <h2>Contact Users</h2>
        <div id="errorMessages"></div>

        <fieldset>
            <table>
                <tr>
                    <td>Select User Type:</td>
                    <td>
                        <select id="userType" onchange="searchUsers()">
                            <option value="">Select Type</option>
                            <option value="Customer">Customer</option>
                            <option value="Technician">Technician</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Search User:</td>
                    <td>
                        <input type="text" id="searchUser" placeholder="Search by name or email" onkeyup="searchUsers()">
                    </td>
                </tr>
                <tr>
                    <td>Subject:</td>
                    <td>
                        <input type="text" id="subject" placeholder="Enter message subject">
                    </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>
                        <textarea id="message" rows="5" placeholder="Type your message here"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button id="sendMessage">Send Message</button>
                    </td>
                </tr>
            </table>
        </fieldset>

        <input type="hidden" id="selectedUserEmail">
        <input type="hidden" id="selectedUserId">

        <div id="searchResults"></div>
    </div>

    <script src="../../js/contact.js"></script>
</body>
</html>

<?php
$db->closeCon($conn);
?>
