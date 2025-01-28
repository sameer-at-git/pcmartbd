<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/addProductstyle.css">
    <title>Add Product</title>
    <a href="../layout/product.php" class="back-button">← Go Back</a>
</head>

<div class="add-product-form">
    <h2>Add New Product</h2>
    <form method="POST" action="../../control/add_product_control.php" enctype="multipart/form-data">
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
        </div>

        <div class="texts">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity">
        </div>

        <div class="texts">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price">
        </div>

        <div class="texts">
            <label for="about">About:</label>
            <textarea id="about" name="about" rows="3"></textarea>
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
        </div>
        
        <div class="texts">
            <label for="photo">Photo of Product:</label>
            <input type="file" id="photo" name="photo">
        </div>

        <button type="submit" name="add_product" class="submit-button">Add Product</button>
        <button type="reset" name="reset" class="rst-button">Clear</button>
    </form>
</div>

</html>