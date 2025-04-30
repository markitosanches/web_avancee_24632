<?php
// require_once('classes/Person.php');
require_once('classes/Employee.php');

$emp = new Employee('Lisa');

//$emp->name="Lisa";
$emp->salary=10000;
$emp->address="Av Sherbrooke";
$emp->setPhone("415-444-88888");
$emp->language = "Français";
$emp->abc = "abc";
echo "<pre>";
var_dump($emp);
echo "</pre>";

echo $emp->getDetails();

?>