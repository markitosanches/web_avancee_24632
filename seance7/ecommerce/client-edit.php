<?php
if(isset($_GET['id']) && $_GET['id']!=null){
extract($_GET);
 
require_once('db/connex.php');

$sql = "SELECT * FROM client WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id));

$count = $stmt->rowCount();
    if($count == 1){
        $client = $stmt->fetch();
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
    <title>Client Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Client Edit</h1>
        <form action="client-update.php" method="post"> 
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Name
                <input type="text" name="name" value="<?= $name; ?>">
            </label>
            <label>Address
                <input type="text" name="address" value="<?= $address; ?>">
            </label>
            <label>Phone
                <input type="text" name="phone" value="<?= $phone; ?>">
            </label>
            <label>Zip Code
                <input type="text" name="zip_code" value="<?= $zip_code; ?>">
            </label>
            <label>Email
                <input type="email" name="email" value="<?= $email; ?>">
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>