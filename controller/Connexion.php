<?php


class Connexion extends Controller
{

    public static function index()
    {
        $errors = [];
        $success=[];
        if (isset($_POST['connect'])) {

            $usermodel = new UtilisateursModel();
            $user = $usermodel->getOne('login', $_POST['login']);
            if (!empty($user)) {
                if ($user['password'] == $_POST['password']) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['login'] = $user['login'];
                    $success[] = 'Bienvenue ' . $user['login'];

                } else {
                    array_push($errors, 'Login ou mot de passe incorrect');
                }
            } else {
                array_push($errors, 'Login ou mot de passe incorrect');
            }
        }
        self::render("connexion", compact("errors","success"));


    }

}
