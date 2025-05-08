<?php

if(isset($_GET['id']) && $_GET['id']!=null){
    //print_r($_GET);
//$id = $_GET['id'];
extract($_GET);
//echo $id;
require_once('db/connex.php');

$sql = "SELECT * FROM client WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id));

$count = $stmt->rowCount();
    if($count == 1){
        $client = $stmt->fetch();

        // echo "<pre>";
        // print_r($client);
        // echo "</pre>";
        
        // echo $client['name'];
        
        // foreach($client as $key=>$value){
        //     $$key = $value;
        // }
        
        // echo $address;
        
        extract($client);
    }else{
        header('location:client-index.php');
        exit;
    } 

}else{
    header('location:client-index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Client</h1>
        <p><strong>Name: </strong><?= $name; ?></p>
        <p><strong>Address: </strong><?= $address; ?></p>
        <p><strong>Phone: </strong><?= $phone; ?></p>
        <p><strong>Email: </strong><?= $email; ?></p>
        <a href="client-edit.php?id=<?= $id;?>" class="btn">Edit</a>

    </div>
</body>
</html>