<?php
class Config{
    // Permet de faire une redirection
    static function getRedirection(string $lien){
        header("Location:" . $lien);
        exit;
    }

    static function getRoute($url){
        ($url[0] == null) ?? self::getRedirection(Params::$page_default);
         
        // Si le controller éxiste pas on renvoie vers la page 404
        $controller = file_exists("src/controller/" . ucfirst($url[0]) . ".php"); 
        if ($controller === true && $url[0] !== "Main" && $url[0] !== "main") {
            require "src/controller/". ucfirst($url[0]) .".php";
        }else{
            require "src/controller/". Params::$page_not_found .".php";
        }
    }

    static function getUrl(){
        // On récupére l'url et on la découpe
        if (isset($_GET["url"])) {
            return explode("/", trim(strtolower($_GET["url"])));
        }else{
            self::getRedirection(Params::$page_default);
        }
    }
}