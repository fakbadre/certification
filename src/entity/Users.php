<?php
class Users{
    static function getAllValues(){
        $read_id = new Crud();
        return $read_id->readAllLine('SELECT * FROM users');
    } 

    static function getOneValue(int $param){
        $read_id = new Crud();
        return $read_id->readOneLine('SELECT * FROM users WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function setAllValues($prenom,$nom,$mail,$tel,$mdp){
        $read_id = new Crud();
        return $read_id->createRequest('INSERT INTO users (prenom,nom,mail,tel,mdp) VALUES 
        (:prenom,:nom,:mail,:tel,:mdp)', [
            ':prenom' => htmlspecialchars($prenom),
            ':nom' => htmlspecialchars($nom),
            ':mail' => htmlspecialchars($mail),
            ':tel' => htmlspecialchars($tel),
            ':mdp' => htmlspecialchars($mdp),
            
        ]);
    }
    
    static function deleteOneValue(int $param){
        $read_id = new Crud();
        return $read_id->createRequest('DELETE FROM users WHERE id=:id', [
            ':id' => htmlspecialchars($param)
        ]);
    }
    
    static function updateOneValue(int $param,$prenom,$nom,$mail,$tel,$mdp){
        $read_id = new Crud();
        return $read_id->createRequest('UPDATE users SET prenom=:prenom, nom=:nom, mail=:mail, tel=:tel, mdp=:mdp WHERE id=:id', [':id' => htmlspecialchars($param),
            ':prenom' => htmlspecialchars($prenom),
            ':nom' => htmlspecialchars($nom),
            ':mail' => htmlspecialchars($mail),
            ':tel' => htmlspecialchars($tel),
            ':mdp' => htmlspecialchars($mdp)
        ]);
    }
}