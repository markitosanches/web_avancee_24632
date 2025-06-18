<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\Privilege;
use App\Models\User;

class UserController {

    public function create(){
            $privilege = new Privilege;
            $privileges = $privilege->select(); 
            // print_r($privileges);
            // die();
            return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data){
        // $user = new User;
        // $unique = $user->unique('username', $data['username']);
        // if($unique){
        // print_r($unique);
        // }else{
        //     echo "error";
        // }

        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('username', $data['username'])->min(2)->max(50)->email()->unique('User');
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->min(2)->max(50)->email();
        $validator->field('privilege_id', $data['privilege_id'], 'Privilege')->required();

        if($validator->isSuccess()){
            $user = new User;
            $data['password'] =  $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            return View::redirect('login');
        }else{
            $errors = $validator->getErrors();
            // print_r($errors);
            $privilege = new Privilege;
            $privileges = $privilege->select();
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data,'privileges' => $privileges]);
        }

    }
}