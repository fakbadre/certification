<?php
class Category{
    static function getAllValues(){
        $read_id = new Crud();
        return $read_id->readAllLine('SELECT * FROM category');
    } 

    static function getOneValue(int $param){
        $read_id = new Crud();
        return $read_id->readOneLine('SELECT * FROM category WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function setAllValues($nom){
        $read_id = new Crud();
        return $read_id->createRequest('INSERT INTO category (nom) VALUES (:nom)', [
            ':nom' => htmlspecialchars($nom)
        ]);
    }
    
    static function deleteOneValue(int $param){
        $read_id = new Crud();
        return $read_id->createRequest('DELETE FROM category WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function updateOneValue(int $param,$nom){
        $read_id = new Crud();
        return $read_id->createRequest('UPDATE category SET nom=:nom WHERE id=:id', [':id' => htmlspecialchars($param),
            ':nom' => htmlspecialchars($nom)
        ]);
    }
}