<?php
require_once('classes/Person.php');

$objet1 = new Person;

// props
$objet1->name = "Peter";

$objet1->zipCode = "ABC";

$objet1->id = 11.5;



echo "<pre>";
var_dump($objet1);
echo "</pre>";
print_r($objet1);
echo "<br>";

echo $objet1->name;
echo "<br>";
echo $objet1->zipCode;

//methods
$objet2 = new Person;
$objet2->setName('Suzan');

echo "<pre>";
var_dump($objet2);
echo "</pre>";
print_r($objet2);
echo "<br>";

echo "<br>";
echo $objet2->getName();

// construct

$objet3 = new Person('Lisa', 'Sherbrooke', '514777777');

$objet3->name = 'John';
echo "<pre>";
var_dump($objet3);
echo "</pre>";

?>

