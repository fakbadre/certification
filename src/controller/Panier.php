<?php
require "src/entity/PanierProduit.php";
require 'Main.php';
class Panier extends Main{
    // récupérer le panier, passer dans le tableau twig les id des contrats selons le user
    public function __construct(){
        new Main();
        $total = 0;

        // On récupère le panier celons l'utilisateur
        $content_panier = $this->readAllLine("SELECT * FROM panier AS p JOIN contrats AS c WHERE p.user_id=:user_id AND c.id=p.produit_id ORDER BY panier_id ASC", [
            ":user_id" => $_SESSION["user_connected"]->id
        ]);

        // Vérifie quel id on doit supprimer 
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty(Config::getUrl()[1])) {
            PanierProduit::deleteOneValue(htmlspecialchars(Config::getUrl()[1]));
            Config::getRedirection("../panier");
        }

        // Récupère le montant de chaque contrat présent
        for ($i=0; $i < count($content_panier); $i++) { 
            $total += $content_panier[$i]->montant;
        }

        echo $this->getView('panier.twig', [
            "content" => $content_panier,
            "total" => $total
        ]);   
    }
}
new Panier();