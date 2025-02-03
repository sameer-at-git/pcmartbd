<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/addProductstyle.css">
    <title>Add Product</title>
    <a href="../layout/product.php" class="back-button">← Go Back</a>
</head>
<body>
    <script src="../../js/add_product.js"></script>
<div class="add-product-form">
    <h2>Add New Product</h2>
    <form method="POST" action="../../control/add_product_control.php" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="texts">
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

        <div class="texts">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand">
            <p id="brand-err"></p>
        </div>

        <div class="texts">
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity">
            <p id="quantity-err"></p>
        </div>

        <div class="texts">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price">
            <p id="price-err"></p>
        </div>

        <div class="texts">
            <label for="about">About:</label>
            <textarea id="about" name="about" rows="3"></textarea>
            <p id="about-err"></p>
        </div>

        <div class="texts">
            <label for="status">Availability Status:</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="status" value="available"> Available
                </label>
                <label class="radio-label">
                    <input type="radio" name="status" value="unavailable"> Unavailable
                </label>
            </div>
            <p id="status-err"></p>
        </div>
        
        <div class="texts">
            <label for="photo">Photo of Product:</label>
            <input type="file" id="photo" name="photo">
            <p id="photo-err"></p>
        </div>

        <button type="submit" name="add_product" class="submit-button">Add Product</button>
        <button type="button" name="reset" class="rst-button" onclick="clearForm()">Clear</button>
    </form>
</div>
</body>

</html>