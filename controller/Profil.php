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
            $reward = $user->getReward($_SESSION['id']);
            self::render('profil', compact('utilisateur','reward'));
        } else {
            header('location:' . path . 'accueil');
        }
    }

    public static function modif($params)
    {
        if (isset($_SESSION['id'])) {
            $success = [];
            $user = new UtilisateursModel();
            $utilisateur = $user->getSpecific($params, $_SESSION['id']);
            if (isset($_POST['modif'])) {
                $modif = $user->update($params, $_POST[$params], $_SESSION['id']);
                array_push($success, "Modification effectuée");
                self::index();

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
            $error = [];
            $success = [];
            if (isset($_POST['modif']) && $_POST['password'] == $_POST['verifypassword']) {
                $user = new UtilisateursModel();
                $user->update($params, password_hash($_POST['password'], PASSWORD_DEFAULT), $_SESSION['id']);
                array_push($success, "Modification effectué");
            } else {
                array_push($error, 'Verifiez votre mot de passe');
            }
            self::render('profilmodif', compact('params', 'error', 'success'));
        } else {
            header('location:' . path . 'accueil');

        }


    }

    public static function histo()
    {
        if(isset($_SESSION['id'])){
            $histo=new HistoriqueModel();
            $historique=$histo->getHisto($_SESSION['id']);
            self::render('historique', compact('historique'));

        }
        else{
            self::index();
        }
    }
}