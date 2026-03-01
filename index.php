<?php
session_start();

// page demandé
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include './template/home.phtml';
        break;
    case 'products':
        include './controller/productController.php';
        break;
    case 'login':
        include './controller/authController.php';
        break;
    case 'register':
        include './controller/registerController.php';
        break;
    case 'logout':
        include './controller/logoutController.php';
        break;
    case 'add_product':
        include './controller/addProductController.php';
        break;
    case 'edit_product':
        include './controller/editProductController.php';
        break;
    case 'delete_product':
        include './controller/deleteProductController.php';
        break;
    default:
        include './template/home.phtml';
        break;
}