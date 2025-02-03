<?php
include "../model/db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pType = $_REQUEST['type'];
    $pBrand = $_REQUEST['brand'];
    $pQuantity = $_REQUEST['quantity'];
    $pStatus = $_REQUEST['status'] ?? null;
    $pAbout = $_REQUEST['about'];
    $pPrice = $_REQUEST['price'];



    $directory = "../view/images/product/";
    $photoPath = "images/product/";
    $uploadFile = $directory . basename($_FILES['photo']['name']);
    $pPic = null;

    $hasError = [];

    if (empty($pType)) {
        $hasError[] = "Enter type";
    }
    if (empty($pBrand)) {
        $hasError[]  = "Enter brand";
    }
    if (empty($pQuantity)) {
        $hasError[]  = "Enter quantity";
    } elseif (!preg_match("/^[0-9]+$/", $pQuantity)) {
            $hasError[] = "Quantity must be a valid number";
    }
    if (empty($pStatus)) {
        $hasError[]  = "Enter Availability status";
    }
    if (empty($pAbout)) {
        $hasError[]  = "Write about product";
    }
    if (empty($pPrice)) {
        $hasError[]  = "Enter product price";
    } elseif (!preg_match("/^[0-9]+$/", $pPrice)) {
        $hasError[] = "Price must be a valid number";
    }
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] != 0) {
        $hasError[] = "Error uploading the product image.";
    } else {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            $pPic = $photoPath . basename($_FILES['photo']['name']);
        } else {
            $hasError[] = "Failed to save the uploaded image.";
        }
    }


    if (!empty($hasError)) {
        echo "<h2>Please correct the following Errors:</h2>";
        echo "<ul>";
        foreach ($hasError as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        if ($pStatus == "available") {
            $pstock = 1;
        } else {
            $pstock = 0;
        }
        $mydb = new myDB();
        $conObj = $mydb->openCon();
        $result = $mydb->addProduct(
            $pType,
            $pBrand,
            $pQuantity,
            $pstock,
            $pPic,
            $pAbout,
            $pPrice,
            $conObj,
        );
        if ($result == 1) {
            header("Location: ../view/functions/show_product.php");
        } else {
            echo "Failled";
        }
    }
}
