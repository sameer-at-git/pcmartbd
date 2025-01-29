function addToCart(productId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            alert("Product added to cart successfully!");
        } else {
            alert("Failed to add product to cart.");
        }
    };

    xhr.send("pid=" + productId);
}
