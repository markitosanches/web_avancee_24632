<?php
require_once('classes/Person.php');
class Employee extends Person{

    public float $salary;

    public function getDetails(){
        return "{$this->name} and CAD {$this->salary}";
    }
}
?>