<?php
require_once('classes/Person.php');

$person = new Person('Peter');

//$person->language = "Français";
$person->setLanguage("Français");
$person->setPhone('454-5545-55555');

echo "<pre>";
var_dump($person);
echo "</pre>";

?>