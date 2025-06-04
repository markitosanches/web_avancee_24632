<?php
namespace App\Models;

abstract class CRUD extends \PDO{

    final public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=ecommerce;port=3306;charset=utf8', 'root', '');
    }

    final public function select($field = null, $order='asc'){
        if($field == null){
            $field = $this->primaryKey;
        }
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        if($stmt = $this->query($sql)){
            return $stmt->fetchAll();
        }else{
            return false;
        }
        
    }

    public function selectId($value){
        $sql = "SELECT * FROM  $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        } 
    }

}

?>