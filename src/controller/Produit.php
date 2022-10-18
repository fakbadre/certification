<?php
require 'Main.php';
require "src/entity/Contrats.php";

class Produit extends Main{
    public function __construct(){
        new Main();
        $this->verifySession();
        $contrat_name = null;
        $contrat_content = null;
        $contrat_img = null;

        if (isset(Config::getUrl()[1]) && !empty(Config::getUrl()[1])) {
            $contrat_name = Contrats::getOneValue(Config::getUrl()[1])->titre;
            $contrat_content = Contrats::getOneValue(Config::getUrl()[1])->contenu;
            $contrat_img = Contrats::getOneValue(Config::getUrl()[1])->img;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            require "src/entity/PanierProduit.php";
            if (!empty(Config::getUrl()[1]) && !empty($_SESSION["user_connected"]->id)) {
                PanierProduit::setAllValues(Config::getUrl()[1], $_SESSION["user_connected"]->id);
            }
        }

        echo $this->getView('produit.twig', [
            "contrats" => Contrats::getAllValues(),
            "contrat_name" => $contrat_name,
            "contrat_contenu" => str_replace(";","<br><br>",$contrat_content),
            "contrat_img" =>  $contrat_img
        ]);   
    }
}
new Produit();