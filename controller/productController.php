<?php
include './model/product.php';

// tri
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

if($sort == 'az'){
    $products = getAllProductsOrderBy('title ASC');
} elseif($sort == 'za'){
    $products = getAllProductsOrderBy('title DESC');
} else {
    $products = getAllProducts();
}

include './template/products.phtml';