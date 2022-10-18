<?php
require 'Main.php';

class Connect extends Main{
    public function __construct(){
        new Main();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          Security::connexion($_POST["mail"], $_POST["mdp"],"produit");  
        }
        echo $this->getView('connect.twig', []);   
    }
}
new Connect();
//require permet d'inclure le fichier en cours qui est Main.php
// la methode construct permet à l'instantiation de la class connect d'executer (les instructions)
//le code à l'interieur.
//quand on rajoute extends on permet à la class connect d'utiliser les methodes public ou protegées
//à l'interieur de celle ci qui est la class parent.
//new nous permet l'intantiation d'un objet à fin d'acceder aux methodes le contenant.
//je fais une condition qui teste si le header de la methodologie utilisée est POST on execute 
// l'instruction
//à l'interieur de la condition.
//le code couleur:vert=class,jaune=fonction/method,bleu=variable ou une 
// superglobale($_Get,$_Post,$_Cookie,...)
//j'utilise l'objet security pour chercher la methogologie statique connection qui permet 
// de recuperer le contenu de mon formulaire
//que l'utilisateur à entrer puis le redirigent vers la route produit.
//j'affiche avec echo la methode getView qui va chercher mon template twig et qui me render ma page à l'ecran.