<?php
namespace App\Controllers;

use App\Providers\View;

class AuthController{
    
    public function index(){
        return View::render('auth/index');
    }
    public function store($data){

    }
    public function delete(){

    }
}

?>