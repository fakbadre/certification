<?php
require "Data.php";
class Crud extends Data{
    // Permet de faire une requête sql simple
    public function createRequest(string $requete, array $parametres = []){
        $bdd = Data::getData();
        $stmt = $bdd->prepare($requete);
        $stmt->execute($parametres);
        return $stmt;
    }

    // Permet de lire une ligne unique dans sa table
    public function readOneLine(string $requete, array $parametres = []){
        $resultat = $this->createRequest($requete, $parametres);
        return $resultat->fetch(PDO::FETCH_OBJ);    
    }

    // Permet de lire toutes les lignes de la table
    public function readAllLine(string $requete, array $parametres = []){
        $resultat = $this->createRequest($requete, $parametres);
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }
}
