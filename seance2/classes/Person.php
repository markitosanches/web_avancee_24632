<?php

class Person{
    public string $name;
    public string $address;
    public string $zipCode = "H1V";
    public string $phone;
    public string $email;
    // public int $id;
    public float $id;
    // private $age;
    // public $birthday;


    public function __construct($name = '', $address= '', $phone = ''){
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }


    public function setName(string $name):void{
        $this->name = $name;
    }

    public function getName():string{
        return "Salut <strong>".$this->name."</strong>";
    }

    public function __destruct(){
        echo "Salut je suis {$this->name} et mon numero est le {$this->phone}" ; 
    }
}

?>