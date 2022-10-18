<?php
require 'Main.php';
require "src/entity/Users.php";
class Register extends Main{
    public function __construct(){
        new Main();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($_POST["mdp"] === $_POST["confirm"]) {
                $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
                if ($this->verifyForm($_POST, ["prenom", "nom", "mail", "tel", "mdp"])) {
                    Users::setAllValues($_POST["prenom"], $_POST["nom"], $_POST["mail"], $_POST["tel"], $mdp);    
                    Security::connexion($_POST["mail"], $_POST["mdp"],"produit");  
        
                }
            }
        }
        echo $this->getView('register.twig', []);   
    }
}
new Register();