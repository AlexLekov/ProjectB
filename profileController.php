<?php
session_start();

require_once "../model/userDao.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $logged_mail = $_SESSION["logged_user"];
    $user = getUserByEmail($logged_mail);
    echo json_encode($user);
}
elseif (isset($_POST["changeProfile"])){
    $email = $_POST["email"];
    $age = $_POST["age"];
    $city = $_POST["city"];
    $user_data = array();
    $user_data["email"] = $email;
    $user_data["age"] = $age;
    $user_data["city"] = $city;
    $old_email = $_SESSION["logged_user"];
    updateUser($user_data, $old_email);
    header("Location: ../view/profile.html");
}