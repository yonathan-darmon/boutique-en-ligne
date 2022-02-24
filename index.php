<?php
session_start();
spl_autoload_register(function ($class) {
    if (file_exists('controller/' . $class . '.php')) {
        require_once('controller/' . $class . '.php');

    }
    if (file_exists('model/' . $class . 'Model.php')) {
        require_once('model/' . $class . 'Model.php');
    }
    if (file_exists('model/' . $class . '.php')) {
        require_once('model/' . $class . '.php');
    }
});
//constante avec le chemin d'index.php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));


$params = explode('/', $_GET['p']);
//on verifie les parametres

if ($params[0] == 'produits') {
    if (isset($params[1])) {
        if ($params[1] == 'harry_potter') {
            Produits::selectBySc($params[1]);
        }

    } else {
        Produits::index();

    }
} elseif ($params[0] == 'connexion') {
    Connexion::index();
} elseif
($params[0] == 'article') {
    Article::index();
} else {
    Accueil::index();
}


