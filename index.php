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

// Paramètres utilisation PHP Mailer

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
        $souC = new SouscategorieModel();
        $souCate = $souC->getOne('name', $params[1]);
        $cat = new CategorieModel();
        $cate = $cat->getOne('name_categories', $params[1]);
        if (count($souCate) > 0) {
            Produits::selectBySc($params[1]);
        } elseif (count($cate) > 0) {
            Produits::selectByCat($_POST['filtre']);
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

        } elseif ($params[1] == 'historique_des_commandes') {
            Profil::histo();
        } else {
            header('location:' . path . 'profil');
        }
    } else {
        Profil::index();
    }
} elseif ($params[0] == 'contact') {
    Contact::index();
} elseif ($params[0] == 'oubli') {
    Connexion::reset();
} elseif ($params[0] == 'admin') {
    if (isset($params[1])) {
        if ($params[1] == 'stock') {
            if(isset($params[2])) {
                Admin::adStock($params[2]);
            }
            Admin::Stock();
        }
        if($params[1] == 'user') {
            if(isset($params[2])) {
                Admin::manageuser($params[2]);

            }
            Admin::user();
        }
        if ($params[1] == 'article') {
            Admin::articles();
        }
        if ($params[1] == 'vente') {
            Admin::ventes();
        }
        if ($params[1] == 'categorie') {
            Admin::categories();
        }
        else{
            Admin::index();
        }


    } else {
        Admin::index();
    }
} elseif ($params[0] == 'deco') {
    Controller::disconnect($_SESSION['id']);

} else {
    Accueil::index();
}


?>