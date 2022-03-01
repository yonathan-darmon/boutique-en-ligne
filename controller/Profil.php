<?php

class Profil extends Controller
{
    public function __construct()
    {
    }

    public static function index()
    {
        if (isset($_SESSION['id'])) {
            $user = new UtilisateursModel();
            $utilisateur = $user->getOne('id', $_SESSION['id']);
            self::render('profil', compact('utilisateur'));
        }
        else{
            header('location:'.  path . 'accueil');
        }
    }
}