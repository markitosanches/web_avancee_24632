<?php
namespace App\Controllers;
use App\Models\Client;
use App\Models\City;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class ClientController{
    public function index(){
        $client = new Client;
        $clients = $client->select();
        // include('views/client/index.php');
        print_r($_SESSION);
        return View::render('client/index', ['clients'=>$clients]);
    }

    public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                // print_r($selectId);
                $city_id = $selectId['city_id'];
                $city = new City;
                $selectedCity = $city->selectId($city_id);
                //print_r($selectedCity);
                $city =  $selectedCity['city'];
                //die();
                
                return View::render('client/show', ['client'=>$selectId, 'city' => $city ]);
            }else{
                return View::render('error', ['message'=>'Client not found!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    public function create(){
        Auth::session();
        $city = new City;
        $cities = $city->select();
        return View::render('client/create', ['cities' => $cities]);
    }

    public function store($data){
        Auth::session();
        $validator = new Validator;
        $validator->field('name',$data['name'])->min(2)->max(10);
        $validator->field('address',$data['address'])->max(50);
        $validator->field('phone',$data['phone'])->max(20);
        $validator->field('zip_code',$data['zip_code'], 'zip code')->max(10);
        $validator->field('email',$data['email'])->max(45)->required();
        $validator->field('city_id',$data['city_id'], 'city')->required();


        if($validator->isSuccess()){
            $client = new Client;
            $insertClient = $client->insert($data);

            if( $insertClient){
                return View::redirect('client/show?id='.$insertClient);
            }else{
                return View::render('error', ['message'=>'404 not found!']);
            }
        }else{
            //retunr avec erreur;
            $errors = $validator->getErrors();
            $city = new City;
            $cities = $city->select();

            return View::render('client/create', ['errors'=>$errors, 'client'=>$data, 'cities' => $cities]);
        }   
    }

    public function edit($data){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            $city = new City;
            $cities = $city->select();
            if($selectId){
                return View::render('client/edit', ['client'=>$selectId, 'cities' => $cities ]);
            }else{
                return View::render('error', ['message'=>'Client not found!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    public function update($data, $get){
        Auth::session();
        // print_r($data);
        // echo "<br>";
        // print_r($get);
        if(isset($get['id']) && $get['id']!=null){
            $validator = new Validator;
            $validator->field('name',$data['name'])->min(2)->max(10);
            $validator->field('address',$data['address'])->max(50);
            $validator->field('phone',$data['phone'])->max(20);
            $validator->field('zip_code',$data['zip_code'], 'zip code')->max(10);
            $validator->field('email',$data['email'])->max(45)->required();
            $validator->field('city_id',$data['city_id'], 'city')->required();


            if($validator->isSuccess()){
                $client = new Client;
                $update = $client->update($data, $get['id']);
                if($update){
                    return View::redirect('clients');
                }else{
                    return View::render('error', ['message'=>'Cannot  update!']);
                }
            }else{
                $errors = $validator->getErrors();
                $city = new City;
                $cities = $city->select();

                return View::render('client/edit', ['errors'=>$errors, 'client'=>$data, 'cities' => $cities]);
                }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }
    public function delete($data){
        if(Auth::session() && Auth::privilege(1)){
        // print_r($data);
        // die();
            $client = new Client;
            $delete = $client->delete($data['id']);
            if($delete){
                return View::redirect('clients');
            }else{
                return View::render('error', ['message'=>'404 not found!']);
            }
        }

    }
}

?>