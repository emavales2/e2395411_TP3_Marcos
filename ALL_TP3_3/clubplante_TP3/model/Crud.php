<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

abstract class Crud extends PDO {

    public function __construct(){
        // AT SCHOOL:
        // parent::__construct('mysql:host=localhost; dbname=clubplantetp3; port=3306; charset=utf8', 'root', '');

        // AT HOME:
        // parent::__construct('mysql:host=localhost; dbname=clubplantetp3; port=3306; charset=utf8', 'root', 'root');

        // WEBDEV
        parent::__construct('mysql:host=localhost; dbname=e2395411; port=3306; charset=utf8', 'e2395411', 'iLPd9vZnaB90nGRPfXXT');
    }

    public function select ($field = 'id', $order = null) {
        
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }


    public function selectId($value) {

        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            //print_r($stmt->fetch());
            return $stmt->fetch();
        
        } else {
            header("location: ../../home/error");
            exit;
        }   
    }


    public function insert($data) {

        $data_keys = array_fill_keys($this->fillable, '');

        $data = array_intersect_key($data, $data_keys);
        // print_r($data);
        // die();

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue)";
        // echo $sql;
        // return $sql;

        $stmt = $this->prepare($sql);
        
        foreach ($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->lastInsertId();
    }


    public function update($data) {

        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        
        //return $sql;

        $stmt = $this->prepare($sql);
        
        foreach($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return true;
        
        } else {
            return $stmt->errorInfo();
        }
    }


    public function delete($value){

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        //return $sql;
        
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        
        if ($stmt->execute()) {
            return true;
        } else {
            print_r($stmt->errorInfo());
        }   
    }
}

?>