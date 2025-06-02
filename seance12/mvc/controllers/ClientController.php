<?php
namespace App\Controllers;
use App\Models\Client;

class ClientController{
    public function index(){
        $client = new Client;
        $clients = $client->select();
        print_r($clients);
    }
}

?>