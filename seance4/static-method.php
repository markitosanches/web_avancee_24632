<?php

require_once('classes/Calculator.php');

$calc = new Calculator;
echo $calc->add(10, 30); 

echo "<br>";




echo Calculator::$message;
echo "<br>";
echo Calculator::add(10, 50);


?>