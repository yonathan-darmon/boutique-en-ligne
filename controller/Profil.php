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
            $reward = $user->getInnerJoin('reward', 'id_reward', "id", "id_reward", $utilisateur[0]["id_reward"]);
            self::render('profil', compact('reward'));
        } else {
            header('location:' . path . 'accueil');
        }
    }

    public static function modif($params)
    {
        if (isset($_SESSION['id'])) {
            $user = new UtilisateursModel();
            $utilisateur = $user->getSpecific($params, $_SESSION['id']);
            if (isset($_POST['modif'])) {
                $modif=$user->update($params,$_POST[$params],$_SESSION['id']);

                header("Refresh:0");

            } else {
                self::render('profilmodif', compact('utilisateur', 'params'));
            }


        } else {
            header('location:' . path . 'accueil');

        }
    }

    public static function modifPassword($params)
    {
        if (isset($_SESSION['id'])) {
            self::render('profilmodif',compact('params'));
        }else{
            header('location:' . path . 'accueil');

        }


    }
}