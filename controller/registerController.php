<?php
include './model/user.php';

$error = "";
$data = $_POST;

if(count($data) > 0){
    $username = $data['username'];
    $password = $data['password'];

    if(empty($username) || empty($password)){
        $error = "Veuillez remplir tous les champs.";
    } else {
        try {
            registerUser($username, $password);
            header("Location: index.php?page=login");
            exit;
        } catch(PDOException $e){
            $error = "Ce nom d'utilisateur existe déjà.";
        }
    }
}

include './template/register.phtml';