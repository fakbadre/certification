<?php
class Data{
    // Permet de se connecter à la base de données
    static function getData(){
        $data_source_name = "mysql:host=". Params::$host .";dbname=" . Params::$data_base . ";charset=utf8mb4";
        try {
            return new PDO($data_source_name,Params::$user,Params::$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}