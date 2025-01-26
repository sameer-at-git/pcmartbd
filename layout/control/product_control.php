<?php
// ProductController.php
require_once('../model/db.php');

function getProducts() {
   
    $products = [];
    for ($i = 1; $i <= 12; $i++) {
        $products[] = [
            'image' => '../images/product-placeholder.jpg',
            'name' => "Product Name $i",
            'rating' => 4,
            'reviews' => 125,
            'price' => 999.99,
            'stock' => true
        ];
    }
    return $products;
}
