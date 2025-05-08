<?php
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// die();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: client-index.php');
    exit;
}

//print_r($_POST);
//Array ( [name] => Peter [address] => Pie Ix [phone] => 6446 [zip_code] => h1jH2 [email] => peter@gmail.com )

// echo $name = $_POST['name'];
// echo "<br>";
// foreach($_POST as $key=>$value){
//     $$key = $value;
// }
/*
$name = '; drop table user; 
$address = Pie Ix
$phone = 6446 
$zip_code = h1jH2 
$email = peter@gmail.com
*/

extract($_POST);

// echo $name;
// die();

require_once('db/connex.php');

$sql = "INSERT INTO client (name, address, phone, zip_code, email) values (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
if($stmt->execute(array($name, $address, $phone, $zip_code, $email))){

    $id = $pdo->lastInsertId();
    header('location:client-show.php?id='.$id);
    
}else{
    print_r($stmt->errorInfo());
}

?>

