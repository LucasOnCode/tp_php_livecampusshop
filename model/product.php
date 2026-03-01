<?php

function getAllProducts() {
    include "./config/connect.php";
    $stmt = $pdo->query("SELECT * FROM products;");
    $products = $stmt->fetchAll();
    return $products;
}

function getAllProductsOrderBy($order) {
    include "./config/connect.php";
    $allowed = ['title ASC', 'title DESC'];
    if(!in_array($order, $allowed)){
        $order = 'title ASC';
    }
    $stmt = $pdo->query("SELECT * FROM products ORDER BY $order;");
    $products = $stmt->fetchAll();
    return $products;
}

function getProductById($id) {
    include "./config/connect.php";
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=:id;");
    $stmt->execute([
        ":id"=>$id
    ]);
    $product = $stmt->fetchAll();
    return $product[0];
}

// add
function addProduct($title, $description, $price, $image) {
    include "./config/connect.php";
    $stmt = $pdo->prepare("INSERT INTO products (title,description,price,image) VALUES (:title,:description,:price,:image);");
    $stmt->execute([
        ":title"=>$title,
        ":description"=>$description,
        ":price"=>$price,
        ":image"=>$image
    ]);
}

// modif
function updateProduct($id, $title, $description, $price, $image) {
    include "./config/connect.php";
    $stmt = $pdo->prepare("UPDATE products SET title=:title, description=:description, price=:price, image=:image WHERE id=:id;");
    $stmt->execute([
        ":id"=>$id,
        ":title"=>$title,
        ":description"=>$description,
        ":price"=>$price,
        ":image"=>$image
    ]);
}

// suppr
function deleteProduct($id) {
    include "./config/connect.php";
    $stmt = $pdo->prepare("DELETE FROM products WHERE id=:id;");
    $stmt->execute([
        ":id"=>$id
    ]);
}