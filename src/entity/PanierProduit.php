<?php
class PanierProduit{
    static function getAllValues(){
        $read_id = new Crud();
        return $read_id->readAllLine('SELECT * FROM panier');
    } 

    static function getOneValue($param){
        $read_id = new Crud();
        return $read_id->readOneLine('SELECT * FROM panier WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function setAllValues($produit_id,$user_id){
        $read_id = new Crud();
        return $read_id->createRequest('INSERT INTO panier (produit_id,user_id) VALUES (:produit_id,:user_id)', [
            ':produit_id' => htmlspecialchars($produit_id),
            ':user_id' => htmlspecialchars($user_id)
        ]);
    }
    
    static function deleteOneValue($param){
        $read_id = new Crud();
        return $read_id->createRequest('DELETE FROM panier WHERE panier_id=:panier_id', [
            ':panier_id' => htmlspecialchars($param)
        ]);
    }
    
    static function updateOneValue($param,$produit_id,$user_id){
        $read_id = new Crud();
        return $read_id->createRequest('UPDATE panier SET produit_id=:produit_id, user_id=:user_id WHERE id=:id', [':id' => htmlspecialchars($param),
            ':produit_id' => htmlspecialchars($produit_id),
            ':user_id' => htmlspecialchars($user_id)
        ]);
    }
}