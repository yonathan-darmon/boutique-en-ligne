<?php


class Connexion extends Controller
{

    public static function index()
    {
        $errors = [];
        if (isset($_POST['connect'])) {

            $usermodel = new UtilisateursModel();
            $user = $usermodel->getOne('login', $_POST['login']);
            if (!empty($user)) {
                if ($user['password'] == $_POST['password']) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['login'] = $user['login'];
                } else {
                    array_push($errors, 'Login ou mot de passe incorrect1');
                }
            } else {
                array_push($errors, 'Login ou mot de passe incorrect2');
            }
        }
        self::render("connexion", compact("errors"));


    }

}
