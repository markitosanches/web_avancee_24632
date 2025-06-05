<?php
namespace App\Controllers;
use App\Models\Client;
use App\Models\City;
use App\Providers\View;
use App\Providers\Validator;

class ClientController{
    public function index(){
        $client = new Client;
        $clients = $client->select();
        // include('views/client/index.php');
        return View::render('client/index', ['clients'=>$clients]);
    }

    public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            //echo $data['id'];
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            // print_r($selectId);
            if($selectId){
                return View::render('client/show', ['client'=>$selectId ]);
            }else{
                return View::render('error', ['message'=>'Client not found!']);
            }

        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    public function create(){
        $city = new City;
        $cities = $city->select();
        return View::render('client/create', ['cities' => $cities]);
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('name',$data['name'])->min(2)->max(10);
        $validator->field('address',$data['address'])->max(1);
        $validator->field('phone',$data['phone'])->max(1);
        $validator->field('zip_code',$data['zip_code'], 'zip code')->max(1);
        $validator->field('email',$data['email'])->max(45)->required();
        $validator->field('city_id',$data['city_id'], 'city')->required();


// echo "<pre>";
//         print_r($validator);
// echo "</pre>";
//         die();

        if($validator->isSuccess()){
            //saisir la donnée
            echo "ok";
        }else{
            //retunr avec erreur;
            $errors = $validator->getErrors();
            //    print_r($errors);
            return View::render('client/create', ['errors'=>$errors, 'client'=>$data]);
        }
        die();
        // print_r($data);
         $client = new Client;
         $insertClient = $client->insert($data);
        //  $city = new City;
        //  $insertCity = $city->insert($data);
        //  echo  $insertClient." / city: ".$insertCity;

         if( $insertClient){
            // header('location:'.BASE.'/client/show?id='.$insertClient);
            return View::redirect('client/show?id='.$insertClient);
         }else{
            return View::render('error', ['message'=>'404 not found!']);
         }
         
    }
}

?>