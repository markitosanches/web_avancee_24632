<?php
require_once('classes/Person.php');

class Client extends Person{
    public string $account;

    // public function __construct($name = ''){
    //     $this->name = $name;
    // }

    // public function setPhone($phone):void{
    //     $this->phone = $phone;
    //     $this->account = "10-".$this->phone;
    // }

    public function getDetails(){
        return "{$this->name} and # {$this->account}";
    }
    // public function setDetails($account, $phone, $a=''){

    // }
}

?>