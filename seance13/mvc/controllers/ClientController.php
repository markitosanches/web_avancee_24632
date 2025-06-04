<?php
namespace App\Controllers;
use App\Models\Client;
use App\Providers\View;

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
}

?>