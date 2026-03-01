<?php
include './model/user.php';

$error = "";
$data = $_POST;

// form envoyé ?
if(count($data) > 0){
    $username = $data['username'];
    $password = $data['password'];

    $user = loginUser($username, $password);
    if($user){
        // stock user dans session
        $_SESSION['user'] = $user['username'];
        header("Location: index.php?page=products");
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}

include './template/login.phtml';