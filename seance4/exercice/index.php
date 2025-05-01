<?php

require_once('classes/Person.php');


echo "<strong>Person</strong>";

$person = new Person;

$person->setName('Peter');
$person->setPhone('444-555-9999');

echo "<pre>";
var_dump($person);
echo "</pre>";

echo $person->getName();
echo "<br>";
echo $person->getPhone();

echo "<hr><strong>Student</strong>";

require_once('classes/Student.php');

$student = new Student;

$student->setName('Lisa');
echo "<pre>";
var_dump($student);
echo "</pre>";
echo $student->getName();

echo "<hr><strong>Teacher</strong>";
require_once('classes/Teacher.php');

$teacher = new Teacher;

$teacher->setName('Annie');
echo "<pre>";
var_dump($teacher);
echo "</pre>";
echo $teacher->getName();
?>