<?php
require_once('classes/CRUD.php');

$crud = new CRUD;

$select = $crud->select('client', 'name');

// echo "<pre>";
// print_r($select);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Clients</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['address']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['phone']?></td>
                <td><a href="client-show.php?id=<?= $row['id'];?>" class="btn">View</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="client-create.php" class="btn">New Client</a>
</body>
</html>