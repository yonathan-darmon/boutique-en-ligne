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
            $reward=$user->getInnerJoin('reward','id_reward', "id", "id_reward",$utilisateur[0]["id_reward"]);
            self::render('profil', compact('reward'));
        }
        else{
            header('location:'.  path . 'accueil');
        }
    }

    public static function modif ()
    {
        if (isset($_SESSION['id'])){
            
        }
        else{
            header('location:'.  path . 'accueil');

        }
    }
}