<?php

abstract class Person{
    public string $name;
    public string $address;
    protected string $phone;
    public string $country;
    private string $language;

    final public function __construct($name){
        $this->name = $name;
    }

    final public function setPhone($phone):void{
        $this->phone = $phone;
    }

    public function setLanguage($language):void{
        $this->language = $language;
    }

    abstract public function getDetails();

    // abstract public function setDetails($a, $b, $c);

}



?>