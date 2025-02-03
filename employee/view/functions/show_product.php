<?php
include('../../model/db.php');
$db = new myDB();
$conn = $db->openCon();


if (isset($_POST['edit_product'])) {
    $result = $db->updateProduct(
        $_POST['pid'],
        $_POST['brand'],
        $_POST['type'],
        $_POST['about'],
        $_POST['quantity'],
        $_POST['price'],
        $_POST['status'],
        $conn
    );
}

if (isset($_POST['delete_product'])) {
    $db->deleteProduct($_POST['pid'], $conn);
}


$products = $db->showProduct($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show and Edit Products</title>
    <link rel="stylesheet" href="../../css/showProductstyle.css">
</head>

<body>
    <div class="top-bar">
        <a href="../layout/product.php" class="back-button">← Go Back</a>
        <div class="search-container">
            <img src="../images/search.png" alt="Search" class="search-icon">
            <a href="searchProduct.php" class="back-button">Search products</a>
        </div>
    </div>

    <h1>Show and Edit Products</h1>



    <table>
            <tr>
                <th>Type</th>
                <th>Brand</th>
                <th>Picture</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>About</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
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
                        <td><img src="<?php echo "../" . $product['photo']; ?>" alt="To be added" width="150"></td>
                        <td><input type="number" name="quantity" value="<?php echo $product['quantity']; ?>"></td>
                        <td><input type="number" name="price" value="<?php echo $product['price']; ?>"></td>
                        <td><input type="text" name="about" value="<?php echo $product['about']; ?>"></td>
                        <td>
                            <select name="status">
                                <option value="1" <?php echo $product['status'] ? 'selected' : ''; ?>>Available</option>
                                <option value="0" <?php echo !$product['status'] ? 'selected' : ''; ?>>Unavailable</option>
                            </select>
                        </td>
                        <td class="actions">
                            <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
                            <input type="hidden" name="photo" value="<?php echo $product['photo']; ?>">
                            <input type="submit" name="edit_product" value="Edit" class="edit-button">
                            <input type="submit" name="delete_product" value="Delete" class="delete-button">
                        </td>
                    </tr>
                </form>
            <?php endwhile;
            $db->closeCon($conn);
            ?>
    </table>
</body>

</html>