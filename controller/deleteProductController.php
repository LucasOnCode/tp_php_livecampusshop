<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

include './model/product.php';

$id = $_GET['id'];
deleteProduct($id);

header("Location: index.php?page=products");
exit;