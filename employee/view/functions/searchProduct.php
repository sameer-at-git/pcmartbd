<?php
session_start();

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $result = $db->searchProducts($search, $conn);
    $products =[];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
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
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/showProductstyle.css">
    <script src="../../js/productSearch.js"></script>
</head>

<body class="Body">
    <div class="header">
        <div class="logo-container">
            <img src="../images/laptop-medical-solid.svg" alt="PCMartBD Logo" class="main-logo">
            <a href="home.php" class="website-name">
                <p>PCMartBD</p>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="main-content-s">
            <div class="search">
                <div class="search-container">
                    <a href="../layout/product.php" class="back-button">←GoBack</a>
                    <img src="../images/search.png" alt="Search" class="search-icon">
                    <input type="text" id="searchProduct" onkeyup="searchProducts(this.value)" placeholder="Search Here">
                </div>
                <div class="search-results-area">
                    <table>
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
                                <td colspan="8">Search results will appear here</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>