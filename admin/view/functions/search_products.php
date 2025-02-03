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
if(isset($_POST['search'])) {
    $result = $db->searchProducts($conn, $_POST['search']);
    $products = array();
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    
    echo json_encode($products);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="../../css/search.css">
    <link rel="stylesheet" href="../../css/index.css">
    <script src="../../js/product_ajax.js"></script>
</head>
<body class="Body">
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
                    <td><a href="../layout/broadcast.php">Broadcast</a></td>
                    <td><a href="../layout/contact_user.php">Contact User</a></td>
                    <td><a href="../../control/sessionout.php">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="main-content-s">
            <div class="search-and-products">
                <div class="search-icon-and-bar">
                    <img src="../../images/search.png" alt="Search" class="search-icon">
                    <input type="text" id="searchProduct" class="search-bar" 
                           placeholder="Search products by Type or Brand..." 
                           onkeyup="searchProducts(this.value)">
                </div>
                <div class="search-results-area">
                    <table class="search-results-table">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Photo</th>
                                <th>About</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            <tr>
                                <td colspan="8" >Search results will appear here</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>