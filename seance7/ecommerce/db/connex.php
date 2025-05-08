<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
try{
    $dbhost = "localhost"; //127.0.0.1
    $dbname = "ecommerce";
    $dbuser = "root";
    $dbpass = "";
    $dbport = 3306;
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;port=$dbport;charset=utf8", $dbuser, $dbpass );
}catch(PDOException $e){
    echo "Error : ". $e->getMessage()."<br>";
    die();
}