<?php
require_once('classes/CRUD.php');

$crud = new CRUD;

$cities = $crud->select('city');

// echo "<pre>";
// print_r($select);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Cities</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cities as $city){
            ?>
            <tr>
                <td><?= $city['id'];?></td>
                <td><?= $city['city'];?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>