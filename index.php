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
}


);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('ASSET/PHPMailer-6.6.0/src/Exception.php');
require_once('ASSET/PHPMailer-6.6.0/src/PHPMailer.php');
require_once('ASSET/PHPMailer-6.6.0/src/SMTP.php');

//constante avec le chemin d'index.php
define('path', '/boutique_en_ligne/');
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
$params = explode('/', $_GET['p']);
//on verifie les parametres
if ($params[0] == 'produits') {
    if (isset($params[1])) {
        if ($params[1] == 'harry_potter') {
            Produits::selectBySc($params[1]);
        } elseif ($params[1] == 'Fantastique') {
            Produits::selectBySc($params[1]);
        } elseif ($params[1] == 'starwars') {
            Produits::selectBySc($params[1]);
        } else {

            Produits::index();
        }

    } else {
        Produits::index();

    }
} elseif ($params[0] == 'connexion') {
    Connexion::index();
} elseif ($params[0] == 'inscription') {
    Inscription::Register();
} elseif ($params[0] == 'article') {
    if (isset($params[1])) {
        Article::index($params[1]);
    } else {
        header('location:' . path . 'produits');
    }
} elseif ($params[0] == 'profil') {
    if (isset($params[1])) {
        if ($params[1] == 'email' || $params[1] == 'login' || $params[1] == 'adresse') {
            Profil::modif($params[1]);

        } elseif ($params[1] == 'password') {
            Profil::modifPassword($params[1]);

        } else {
            header('location:' . path . 'profil');
        }
    } else {
        Profil::index();
    }
} 
elseif($params[0] == 'contact') {
    Contact::index();
}
else {
    Accueil::index();
}



?>