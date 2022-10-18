Implémenter la régénération de token dans le input:
<input type="hidden" name="csrf" value="Security::regenererToken()">

Pour vérifier ce token:
````php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    if (Security::verifierToken($_POST["csrf"]) === false) {
        die("FRAUDE");
    }
}
```
// Commandes
- php bin/controller.php   "Créer un controller + vue"
- php bin/database.php     "Créer une base de données"
- php bin/table.php        "Créer une table"

// Failles web corrigés
-lfi
-rfi
-injection sql
-csrf
-xss
-upload

// Solu table:
Question 1 : Mentionner le nom de votre table.
Question 2 : Voulez-vous un id ?
Question 3 : Mentionner le nom de votre champ.
Question 4 : Quel est son type ?
Question 5 : Voulez-vous rajouter un champ ? 

// Boucler de la question 3 à 5 jusqu'à complèter toute la table , si on ne veut pas rajouter d'autres champs on demande s'il souhaite une relation dans le cas ou il ne veut pas on crée la table. Si il veut une relation il devra spécifier la première table et quel champ et pareil pour la deuxième , ("Mettre sur la doc qu'il devra faire les tables intermédiaires seul et refaire les tables si les relations se cassent")


// Database.php

//Pour demander à l'utilisateur quel nom il veut attribuer à la création de sa base de données.
- //readline("Mentionner le nom de votre base de données? \n ");

/*
Une fois la table créée, on génère une entité.
On crée la requête et quand elle est créer on renvoie un tableau
avec des setters et on lui construit un controller avec un crud fait d'avance.
*/


/* SYNTAXE POUR RECUPERER DES DONNEES DE SON ENTITE*/
$this->readAllLine("SELECT * FROM uber WHERE id=:id", [
    ":id" => Uber::getValues(3)[0]->id
]);

// Récupérer un paramètre dans son url on doit rajouter ça à son controller:
"url" => (isset(Config::getUrl()[1])) ? Config::getUrl()[1] : null

// Sinon si on veux juste le chiffre en deuxième paramètre on indique ça à l'endroit voulu
// si on veux intéragir avec plus de paramètres on doit changer le chiffre dans le tableau [1,2,3,4,5,6....]:
Config::getUrl()[1];

/*  ----------------------------  CREATION D'UN FORMULAIRE  ----------------------------  */
// Comment faire un formulaire ?
tapez la commande suivante: php bin/createform.php

Répondez aux questions.

// Le formulaire est déposer dans formView
Pour l'utiliser faire un require avec le bon chemin depuis votre controller et l'envoyer dans twig comme ceci:
"exemple" => Form::create()

// Sur la page twig:
{{ exemple|raw }}

Le formulaire est en place! Pour le styliser rendez-vous dans la librairie qui vous expliquera comment faire ou bien encore regardez nos composants formulaires à la mode!
/* --------------------------------------------------------------------------------------- */

// Pour faire un upload de fichier on doit avoir cet 
// attribut sur nottre formulaire pour que la super 
// global $_FILES fonctionne pour dire que l'on accepte 
// le code binaire.
enctype='multipart/form-data'




//A la création d'un formulaire, au moment ou l'on nous demande comment s'appellera notre bouton de validation
//si l'on doit écrire (s'inscrire) on l'écrira en méttant un anti-slash comme ceci (s\'inscrire)


/* Bugs trouver */
Page : ffff
Bug: Mon bug était ......

// Fast And Furius Site
// Big and Fast Site
// Professionnal fast site
// Sportif Site
// Make Fast Site
// Do Fast Site
// Does Fast Site
