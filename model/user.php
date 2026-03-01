<?php

// inscription user
function registerUser($username, $password) {
    include "./config/connect.php";
    // hash mdp
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username,password) VALUES (:username,:password);");
    $stmt->execute([
        ":username"=>$username,
        ":password"=>$hash
    ]);
}

// log user
function loginUser($username, $password) {
    include "./config/connect.php";
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username;");
    $stmt->execute([
        ":username"=>$username
    ]);
    $user = $stmt->fetch();
    // check mdp hash
    if($user && password_verify($password, $user['password'])){
        return $user;
    }
    return false;
}