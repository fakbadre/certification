<?php
class Contrats{
    static function getAllValues(){
        $read_id = new Crud();
        return $read_id->readAllLine('SELECT * FROM contrats');
    } 

    static function getOneValue(int $param){
        $read_id = new Crud();
        return $read_id->readOneLine('SELECT * FROM contrats WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function setAllValues($titre,$contenu,$montant, $img,$produit_category){
        $read_id = new Crud();
        return $read_id->createRequest('INSERT INTO contrats (titre,contenu,montant,img,produit_category) VALUES (:titre,:contenu,:montant, :img,:produit_category)', [
            ':titre' => htmlspecialchars($titre),
            ':contenu' => htmlspecialchars($contenu),
            ':montant' => htmlspecialchars($montant),
            ':img' => htmlspecialchars($img),
            ':produit_category' => htmlspecialchars($produit_category)
        ]);
    }
    
    static function deleteOneValue(int $param){
        $read_id = new Crud();
        return $read_id->createRequest('DELETE FROM contrats WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function updateOneValue(int $param,$titre,$contenu, $img,$montant,$produit_category){
        $read_id = new Crud();
        return $read_id->createRequest('UPDATE contrats SET titre=:titre, contenu=:contenu, img=:img, montant=:montant, produit_category=:produit_category WHERE id=:id', [':id' => htmlspecialchars($param),
            ':titre' => htmlspecialchars($titre),
            ':contenu' => htmlspecialchars($contenu),
            ':montant' => htmlspecialchars($montant),
            ':img' => htmlspecialchars($img),
            ':produit_category' => htmlspecialchars($produit_category)
        ]);
    }
}