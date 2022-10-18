<?php
session_start();
require "Config.php";
require "Params.php";
require "vendor/autoload.php";
class Kronos extends Config{
    // Rooter permettant de vérifier l'url et afficher le controller éxistant ou non
    public function __construct(){      
        strtolower(Config::getRoute(Config::getUrl()));
    }
}
$kronos = new Kronos;