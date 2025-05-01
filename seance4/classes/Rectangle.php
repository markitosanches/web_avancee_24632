<?php

require_once('interface/Shape.php');

class Rectangle implements Shape{
    private float $height;
    private float $width;

    public function __construct(float $h, float $w){
        $this->height = $h;
        $this->width = $w;
    }

    public function calcArea(){
        return $this->width * $this->height;
    }

}

?>