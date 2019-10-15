<?php

$pdo = null;


const DB_NAME = "Wow";
const DB_IP = "192.168.8.22";
const DB_PORT = "3306";
const DB_USER = "RealDeal";
const DB_PASS = "123";

try {
    $pdo = new PDO("mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $e){
    echo "Problem with db query  - " . $e->getMessage();
}
