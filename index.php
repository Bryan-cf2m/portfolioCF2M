<?php
/*
 * Ceci sera le contrôleur frontal, càd toutes les requêtes passeront par ce fichier
 */

//Session 
session_start();

// dependencies
require_once "config.php";

// Mysql connection (mysqli procedural driver)
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT);
mysqli_set_charset($db, "utf8");

if(isset($_SESSION['notresession'])&&$_SESSION['notresession']===session_id()) {
    
    if(isset($_GET['admin'])){
        $admin = $_GET["admin"];
        switch ($admin){
            case "logout":
                header("Location: admin/disconnect.php");
                break;
            case "paneladmin":
                require "admin/panel-admin.php";
                break;
            case "messadmin":
                require "admin/messadmin.php";
                break;
            case "galerieadmin":
                require "admin/galerieadmin.php";
                break;
            case "linksadmin":
                require "admin/linksadmin.php";
                break;
            case "bddusers":
                require "admin/bddusers.php";
                break;  
            default:
                require "admin/404admin.php";

        }

    }else{
        require_once "admin/panel-admin.php";
    }
} else {
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
            case "link":
                require "pages/liens.php";
                break;
            case "login":
                require "pages/connexion.php";
                break;
            case "about":
                require "pages/about.php";
                break;
            case "formphp":
                require "pages/tutos/formphp.php";
                break;
            case "tweenmax":
                require "pages/tutos/tweenmax.php";
                break;
            case "mess-envoye":
                require "pages/mess-envoye.php";
                break;  
            default:
                require "pages/404.php";
        }
    }
}