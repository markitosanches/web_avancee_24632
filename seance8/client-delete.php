<?php

$id = $_POST['id'];
require_once('classes/CRUD.php');

$crud = new CRUD;

$delete = $crud->delete('client', $id);

if($delete){
    header('location:client-index.php');
}else{
    echo "Error";
}


?>