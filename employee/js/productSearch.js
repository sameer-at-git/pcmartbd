function searchProducts(searchBy) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'searchProduct.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var products = JSON.parse(xhr.responseText);
            var output = '';

            if (products.length > 0) {
                for (var i = 0; i < products.length; i++) {
                    var product = products[i];
                    output += '<tr>' +
                        '<td>' + product.pid + '</td>' +
                        '<td>' + product.type + '</td>' +
                        '<td>' + product.brand + '</td>' +
                        '<td>' + product.quantity + '</td>' +
                        '<td>' + (product.status == 1 ? 'Available' : 'Not Available') + '</td>' +
                        '<td><img src="../' + product.photo + '" alt="' + product.type + '" width="310"></td>' +
                        '<td>' + product.about + '</td>' +
                        '<td>' + product.price + '</td>' +
                        '</tr>';
                }
            } else {
                output = '<tr><td colspan="8" >No products found</td></tr>';
            }

            document.getElementById('searchResults').innerHTML = output;
        }
    }

    xhr.send('search=' + searchBy);
}
