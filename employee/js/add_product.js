function validateBrand() {
    var brand = document.getElementById("brand").value;
    if (brand.trim() === "") {
        document.getElementById("brand-err").innerHTML = "Brand name is required.";
        return false;
    } else if (brand.trim().length < 2) {
        document.getElementById("brand-err").innerHTML = "Brand name must be at least 2 characters.";
        return false;
    } else {
        document.getElementById("brand-err").innerHTML = "";
        return true;
    }
}

function validateQuantity() {
    var quantity = document.getElementById("quantity").value;
    if (quantity.trim() === "" || quantity <= 0) {
        document.getElementById("quantity-err").innerHTML = "Please enter a valid quantity ";
        return false;
    } 
    else if(isNaN(quantity)) {
        document.getElementById("quantity-err").innerHTML = "Please enter number only ";
        return false;
    }
    else {
        document.getElementById("quantity-err").innerHTML = "";
        return true;
    }
}

function validatePrice() {
    var price = document.getElementById("price").value;
    if (price.trim() === "" || price <= 0) {
        document.getElementById("price-err").innerHTML = "Please enter a valid price ";
        return false;
    } else if(isNaN(price)) {
        document.getElementById("price-err").innerHTML = "Please enter number only ";
        return false;
    } else {
        document.getElementById("price-err").innerHTML = "";
        return true;
    }
}

function validateAbout() {
    var about = document.getElementById("about").value;
    if (about.trim() === "") {
        document.getElementById("about-err").innerHTML = "Product description is required.";
        return false;
    } else if (about.trim().length < 10) {
        document.getElementById("about-err").innerHTML = "Description must be at least 10 characters.";
        return false;
    } else {
        document.getElementById("about-err").innerHTML = "";
        return true;
    }
}

function validateStatus() {
    var status = document.querySelector('input[name="status"]:checked');
    if (!status) {
        document.getElementById("status-err").innerHTML = "Please select availability status.";
        return false;
    } else {
        document.getElementById("status-err").innerHTML = "";
        return true;
    }
}

function validatePhoto() {
    var photo = document.getElementById("photo").value;
    
    if (photo.trim() === "") {
        document.getElementById("photo-err").innerHTML = "Please select a product image.";
        return false;
    } else {
        document.getElementById("photo-err").innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isBrandValid = validateBrand();
    var isQuantityValid = validateQuantity();
    var isPriceValid = validatePrice();
    var isAboutValid = validateAbout();
    var isStatusValid = validateStatus();
    var isPhotoValid = validatePhoto();

    if (
        isBrandValid &&
        isQuantityValid &&
        isPriceValid &&
        isAboutValid &&
        isStatusValid &&
        isPhotoValid
    ) {
        return true;
    } else {
        return false;
    }
}

function clearForm() {
    document.getElementById("brand").value = "";
    document.getElementById("quantity").value = "";
    document.getElementById("price").value = "";
    document.getElementById("about").value = "";
    document.querySelector('input[name="status"]').checked = false;
    document.getElementById("photo").value = "";
    document.getElementById("brand-err").innerHTML = "";
    document.getElementById("quantity-err").innerHTML = "";
    document.getElementById("price-err").innerHTML = "";
    document.getElementById("about-err").innerHTML = "";
    document.getElementById("status-err").innerHTML = "";
    document.getElementById("photo-err").innerHTML = "";
}


