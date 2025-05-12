<?php

class CRUD extends PDO{

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=ecommerce;port=3306;charset=utf8', 'root', '');
    }

    public function select($table, $field = 'id', $order='asc'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id'){
        $sql = "SELECT * FROM  $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        } 
    }

    public function insert($table, $data){

        //Array ( [name] => Peter [address] => Maisonneuve [phone] => 54654 [zip_code] => h1h1h1 [email] => peter@gmail.com ) INSERT INTO client
        //INSERT INTO client (name, address, phone, zip_code, email) VALUES (:name, :address, :phone, :zip_code, :email)
       //INSERT INTO client (name, address, phone, zip_code, email) VALUES (name, :address, :phone, :zip_code, :email)

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue);";
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }

    public function delete($table, $value, $field = 'id'){

        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}