<?php


function existsUser($email, $pass){
    require_once "dbmanager.php";
    $statement = $pdo->prepare("SELECT COUNT(*) as broi FROM users WHERE email = ? AND password = ?");
    $statement->execute(array($email, $pass));
    $result = $statement->fetch();
    return $result["broi"] > 0;
}

function getUserByEmail($email){
    require_once "dbmanager.php";
    $statement = $pdo->prepare("SELECT email, age, city FROM users WHERE email = ?");
    $statement->execute(array($email));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function updateUser($user_data, $old_email){
    require_once "dbmanager.php";
    $statement = $pdo->prepare("UPDATE users SET email = ?, age = ?, city = ? WHERE email = ?");
    $statement->execute(array($user_data["email"], $user_data["age"], $user_data["city"], $old_email));
}