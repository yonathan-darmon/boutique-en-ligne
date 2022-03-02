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
                if ($user[0]['password'] == password_verify($_POST['password'], $user[0]['password'])) {
                    $_SESSION['id'] = $user[0]['id'];
                    $_SESSION['login'] = $user[0]['login'];
                    $success[] = 'Bienvenue ' . $user[0]['login'];

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
