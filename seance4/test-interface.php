<?php

require_once("classes/Circle.php");

echo "<strong>Circle</strong>";
$circle = new Circle(3.5);

echo "<pre>";
var_dump($circle);
echo "</pre>";

echo $circle->calcArea();


echo "<hr>";
require_once("classes/Rectangle.php");

echo "<strong>Rectangle</strong>";

$rectangle = new Rectangle(20, 15);

echo "<pre>";
var_dump($rectangle);
echo "</pre>";

echo $rectangle->calcArea();
?>

