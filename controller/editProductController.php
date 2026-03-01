<?php
if(!isset($_SESSION['user'])){
    header("Location: index.php?page=login");
    exit;
}

include './model/product.php';

$error = "";
$id = $_GET['id'];
$product = getProductById($id);

$data = $_POST;

// si form alors update
if(count($data) > 0){
    $title = $data['title'];
    $description = $data['description'];
    $price = $data['price'];
    $image = $data['image'];

    if(empty($title) || empty($price)){
        $error = "Le titre et le prix sont obligatoires.";
    } else {
        updateProduct($id, $title, $description, $price, $image);
        header("Location: index.php?page=products");
        exit;
    }
}

include './template/editProduct.phtml';