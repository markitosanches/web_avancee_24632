<?php
namespace App\Controllers;

use App\Models\ExampleModel;

class HomeController{

    public function index(){
        $model = new ExampleModel();
        $data = $model->getData();
        include('views/home.php');
    }
}