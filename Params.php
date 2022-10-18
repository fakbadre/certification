<?php
/*
Page qui permet de paramètrer son outil de travail
*/
class Params{
    // Quelle page par défault voulez-vous ?
    static string $page_default = "home";

    // Comment s'appelle votre page 404 ?
    static string $page_not_found = "NotFound";

    ////////////////////////////////////////////
    //                 Data Base              //
    ////////////////////////////////////////////

    // Mentionner le nom de votre base de données.
    static string $data_base = "agence_voyage";

    // Quel est le host de votre base de données ?
    static string $host = "localhost";

    // Mentionner le nom d'utilisateur de votre base de données.
    static string $user = "root";

    // Mentionner le mot de passe de votre base de données.
    static string $pass = "";
}