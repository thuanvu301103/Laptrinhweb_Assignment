<?php
    session_start();
    include_once('../models/product.php');

    $product = new Products();
    $listProduct = $product->getProductList();
?>
