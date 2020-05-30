<?php
/*
 * Ceci sera le contrôleur frontal, càd toutes les requêtes passeront par ce fichier
 */

// si la variable d'url p n'existe pas
if(!isset($_GET["p"])){
    // on importe le fichier accueil.php qui se trouve dans le dossier files, include permet d'importer n'importe quel fichier local
    require "pages/accueil.php";

// "p" existe
}else{

    $p = $_GET["p"];

    switch ($p){
        case "accueil":
            require "pages/accueil.php";
            break;
        case "rea":
            require "pages/rea.php";
            break;
        case "tuto":
            require "pages/tuto.php";
            break;
        case "contact":
            require "pages/contact.php";
            break;
        case "login":
            require "pages/connexion.php";
            break;
        case "about":
            require "pages/about.php";
            break;
        default:
            require "pages/accueil.php";
    }
}