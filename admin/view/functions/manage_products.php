<?php
session_start();
if (!isset($_SESSION['user_access'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['add_product'])) {
    $db->addProduct(
        $_POST['type'],
        $_POST['brand'],
        intval($_POST['quantity']),
        intval($_POST['price']),
        $_POST['about'],
        $_POST['photo'],
        $_SESSION['user_id']
    );
}

$products = $db->getProducts();
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
        <a href="../layout/home.php" class="back-button">←Back to Home</a>
        <div class="search-container">
            <img src="../../images/search.png" alt="Search" class="search-icon">
            <input type="text" id="searchProduct" class="search-bar" placeholder="Search products...">
        </div>
    </div>
    
    <h1>Manage Products</h1>
    
    <div class="add-product-form">
        <h2>Add New Product</h2>
        <form method="POST" action="">
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
            <?php while ($product = $products->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['type']); ?></td>
                    <td><?php echo htmlspecialchars($product['brand']); ?></td>
                    <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                    <td>৳<?php echo number_format($product['price']); ?></td>
                    <td><?php echo $product['status'] ? 'Active' : 'Inactive'; ?></td>
                    <td class="actions">
                        <a href="edit_product.php?id=<?php echo $product['pid']; ?>" class="edit-button">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['pid']; ?>" class="delete-button">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script src="../../js/managing.js"></script>
</body>

</html>
