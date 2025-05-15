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

    public function update($table, $data, $field = "id"){

        //Array ( [id] => 7 [name] => Annie [address] => Av de La Salle [phone] => 545454545 [zip_code] => h1h1h2h [email] => annie@gmail.com )
        // UPDATE client SET name = :name, address = :address, phone = :phone, zip_code = :zip_code, email = :email WHERE id = :id
        // UPDATE client SET id = :id, name = :name, address = :address, phone = :phone, zip_code = :zip_code, email = :email, city_id =:city_id, WHERE id = :id
        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');
        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";
        // return $sql;
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
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