<?php
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['user_id'])) {
    header('Location: ../../../layout/login.php');
    exit();
}

include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();

if (isset($_POST['add_product'])) {
    $db->addProduct(
        $conn,
        $_POST['type'],
        $_POST['brand'],
        intval($_POST['quantity']),
        intval($_POST['price']),
        $_POST['about'],
        $_POST['photo'],
        $_SESSION['user_id']
    );
}

if (isset($_POST['edit_product'])) {
    $db->updateProduct(
        $conn,
        $_POST['pid'],
        $_POST['type'],
        $_POST['brand'],
        intval($_POST['quantity']),
        intval($_POST['price']),
        $_POST['about'],
        $_POST['photo'],
        $_POST['status']
    );
}

if (isset($_POST['delete_product'])) {
    $db->deleteProduct($conn, $_POST['pid']);
}

$products = $db->getProducts($conn);
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
                <select id="type" name="type" required>
                    <option value="laptop">Laptop</option>
                    <option value="ram">RAM</option>
                    <option value="ssd">SSD</option>
                    <option value="gpu">GPU</option>
                    <option value="cpu">CPU</option>
                    <option value="motherboard">Motherboard</option>
                    <option value="psu">PSU</option>
                    <option value="casing">Casing</option>
                    <option value="monitor">Monitor</option>
                    <option value="cooler">Cooler</option>
                    <option value="keyboard">Keyboard</option>
                    <option value="mouse">Mouse</option>
                </select>
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
                <th class="type-column">Type</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = $products->fetch_assoc()): ?>
                <form method="post">
                    <tr>
                        <td>
                            <select name="type">
                                <option value="laptop" <?php echo ($product['type'] == 'laptop') ? 'selected' : ''; ?>>Laptop</option>
                                <option value="ram" <?php echo ($product['type'] == 'ram') ? 'selected' : ''; ?>>RAM</option>
                                <option value="ssd" <?php echo ($product['type'] == 'ssd') ? 'selected' : ''; ?>>SSD</option>
                                <option value="gpu" <?php echo ($product['type'] == 'gpu') ? 'selected' : ''; ?>>GPU</option>
                                <option value="cpu" <?php echo ($product['type'] == 'cpu') ? 'selected' : ''; ?>>CPU</option>
                                <option value="motherboard" <?php echo ($product['type'] == 'motherboard') ? 'selected' : ''; ?>>Motherboard</option>
                                <option value="psu" <?php echo ($product['type'] == 'psu') ? 'selected' : ''; ?>>PSU</option>
                                <option value="casing" <?php echo ($product['type'] == 'casing') ? 'selected' : ''; ?>>Casing</option>
                                <option value="monitor" <?php echo ($product['type'] == 'monitor') ? 'selected' : ''; ?>>Monitor</option>
                                <option value="cooler" <?php echo ($product['type'] == 'cooler') ? 'selected' : ''; ?>>Cooler</option>
                                <option value="keyboard" <?php echo ($product['type'] == 'keyboard') ? 'selected' : ''; ?>>Keyboard</option>
                                <option value="mouse" <?php echo ($product['type'] == 'mouse') ? 'selected' : ''; ?>>Mouse</option>
                            </select>
                        </td>
                        <td><input type="text" name="brand" value="<?php echo $product['brand']; ?>"></td>
                        <td><input type="number" name="quantity" value="<?php echo $product['quantity']; ?>"></td>
                        <td><input type="number" name="price" value="<?php echo $product['price']; ?>"></td>
                        <td>
                            <select name="status">
                                <option value="1" <?php echo $product['status'] ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo !$product['status'] ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </td>
                        <td class="actions">
                            <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
                            <input type="hidden" name="photo" value="<?php echo $product['photo']; ?>">
                            <input type="hidden" name="about" value="<?php echo $product['about']; ?>">
                            <input type="submit" name="edit_product" value="Edit" class="edit-button">
                            <input type="submit" name="delete_product" value="Delete" class="delete-button">
                        </td>
                    </tr>
                </form>
            <?php endwhile;
            $db->closeCon($conn);
             ?>
        </tbody>
    </table>
    <script src="../../js/managing.js"></script>
</body>

</html>
