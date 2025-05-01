<?php
require_once('interface/Shape.php');

class Circle implements Shape{
    private float $radius;

    public function __construct(float $radius){
        $this->radius = $radius;
    }

    public function calcArea(){
        return $this->radius * $this->radius * pi(); 
    }
}

?>