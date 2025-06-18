<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\User;

class AuthController{
    
    public function index(){
        return View::render('auth/index');
    }
    public function store($data){
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(2)->max(50)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);
         if($validator->isSuccess()){
            $user = new User;
            $checkuser = $user->checkUser($data['username'], $data['password']);
            if($checkuser){
                // print_r($_SESSION);
                return View::redirect('clients');
            }else{
                $errors['message'] = "Please check your credentials!";
                return View::render('auth/index', ['errors'=>$errors]);
            }

        }else{
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors'=>$errors]);
        }


    }
    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}

?>