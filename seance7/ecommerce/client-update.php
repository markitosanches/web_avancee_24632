<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: client-index.php');
    exit;
}

//print_r($_POST);
// Array ( [id] => 2 [name] => Lisa [address] => 1010, Main street [phone] => 444-888-7777 [zip_code] => 60780 [email] => lisa@test.ca )
extract($_POST);
require_once('db/connex.php');
$sql = "UPDATE client SET name = ?, address = ?, phone = ?, email = ?, zip_code = ? WHERE id = ? ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($name, $address, $phone, $email, $zip_code, $id));
$count= $stmt->rowCount();
if($count==1){
    header("location:client-index.php");
}else{
    print_r($stmt->errorInfo());
}

