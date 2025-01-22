<?php
session_start();
if (!isset($_SESSION['user_access'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

// Add new product functionality
if (isset($_POST['add_product'])) {
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $quantity = intval($_POST['quantity']);
    $price = intval($_POST['price']);
    $about = $_POST['about'];
    $photo = $_POST['photo'];
    $added_by = $_SESSION['user_id']; // Get from session
    $status = 1; // Default active status
    
    $sql = "INSERT INTO product (type, brand, quantity, price, about, photo, added_by, status) 
            VALUES ('$type', '$brand', $quantity, $price, '$about', '$photo', '$added_by', $status)";
    
    if ($conn->query($sql)) {
        $success_message = "Product added successfully!";
    } else {
        $error_message = "Error adding product: " . $conn->error;
    }
}

// Fetch all products
$sql = "SELECT * FROM product ORDER BY pid";
$result = $conn->query($sql);

// Check if query was successful
if ($result === false) {
    die("Error in query: " . $conn->error);
}

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="../../css/managestyle.css">
</head>

<body>
    <div class="top-bar">
        <a href="../admin_home.php" class="back-button">Back to Dashboard</a>
        <div class="search-container">
            <img src="../../images/search.png" alt="Search" class="search-icon">
            <input type="text" id="searchProduct" class="search-bar" placeholder="Search products...">
        </div>
    </div>
    
    <h1>Manage Products</h1>
    
    <?php if (isset($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <!-- Add Product Form -->
    <div class="add-product-form">
        <h2>Add New Product</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">Product Type:</label>
                <input type="text" id="type" name="type" required>
            </div>
            
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>
            
            <div class="form-group">
                <label for="about">About:</label>
                <textarea id="about" name="about" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="photo">Photo URL:</label>
                <input type="text" id="photo" name="photo">
            </div>
            
            <button type="submit" name="add_product" class="submit-button">Add Product</button>
        </form>
    </div>

    <!-- Products Table -->
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['type']); ?></td>
                        <td><?php echo htmlspecialchars($product['brand']); ?></td>
                        <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                        <td>৳<?php echo number_format($product['price']); ?></td>
                        <td><?php echo $product['status'] ? 'Active' : 'Inactive'; ?></td>
                        <td class="actions">
                            <a href="edit_product.php?id=<?php echo $product['pid']; ?>" class="edit-button">Edit</a>
                            <a href="delete_product.php?id=<?php echo $product['pid']; ?>" 
                               class="delete-button" 
                               onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No products found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../../js/managing.js"></script>
</body>

</html>
