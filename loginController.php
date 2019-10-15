<?php

session_start();
require_once "../model/userDao.php";

if(isset($_POST["login"])){

    $email = htmlentities($_POST["email"]);
    $pass = htmlentities($_POST["password"]);
    try {
        if (existsUser($email, sha1($pass))) {
            $_SESSION["logged_user"] = $email;
            header("location:../view/main.html");
        } else {
            header("location:../view/loginFailed.html");
        }
    }
    catch (PDOException $e){
        header("location:../view/error.html");
    }
}