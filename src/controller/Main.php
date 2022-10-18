<?php
require "src/model/Crud.php";
require "securite/Security.php";
class Main extends Crud{
    public function __construct(){ 
        $this->getStyle();
    }

    // Permet d'afficher la page twig que l'on veux et de lui envoyer un tableau à afficher
    public function getView(string $page, array $tab, string $path = "src/template"){
        $dossier = new \Twig\Loader\FilesystemLoader($path);

        // Sélectionne l'environement de travail + option cache en false
        $twig = new \Twig\Environment($dossier,[
            'debug' => false // true pour utiliser le dump()
        ]);

        $twig->addExtension(new \Twig\Extension\DebugExtension());

        // Paramètres par défaut
        $ajout[] = [
            "dir" => $this->getDir(),
            "security_token" => Security::regenererToken()
        ];

        //Fusion des tableaux
        $tableau_valeurs = [
            array_merge($tab,$ajout[0])
        ];

        return $twig->render($page,$tableau_valeurs[0]);
    }

    // Vérifie si l'utilisateur utilise une attaque csrf sur un formulaire
    // et si tous les champs sont bien remplis si non il renvoie false
    public function verifyForm(array $form, array $champs){
        if (Security::verifierToken($_POST['token']) === true) {
            foreach($champs as $champ){
                if(!isset($form[$champ]) || empty($form[$champ])) { 
                    return false;
                };
            }
            return true;
        }else{
            die("FRAUDE, ne recommencez pas!");
        }
    }

    // Vérifie si la session éxiste dans le cas ou elle n'éxiste pas on renvoie vers la page par défault
    public function verifySession(){
        if (!isset($_SESSION["user_connected"]) && empty($_SESSION["user_connected"])) {
            Config::getRedirection(Params::$page_default);
        }
    }

    // Sert de configuration css "A améliorer"
    public function getStyle($css = "main.css", $js = "BurgerMenu.js"){
        $tab[] = "<link rel='stylesheet' href='" . $this->getDir() . "public/assets/css/$css'>";
        $tab[] = "<script defer src='" . $this->getDir() . "public/assets/js/$js'></script>";
        $a = 0;
        while ($a < count($tab)) {
            echo $tab[$a] . "\n";
            $a++;
        }
    }

    // Donne le bon chemin
    public function getDir(){
        $counter = count(Config::getUrl());
        $dir = null;

        for ($i=1; $i < $counter; $i++) { 
            $dir = $dir . "../";
        }
        return $dir;
    }

    // Donne  une image
    public function getImg(string $css = "w15",string $img = "burger_menu.svg", string $alt = "photo"){
        return "<img class='" . $css . "' src='{{ dir }}public/assets/img/$img' alt='" . $alt . "'>";
    }
}