<?php


class Connexion extends Controller
{

    public static function index()
    {
        $errors = [];
        $success = [];
        if (isset($_POST['connect'])) {

            $usermodel = new UtilisateursModel();
            $user = $usermodel->getOne('login', htmlspecialchars($_POST['login']));
            if (!empty($user)) {
                if ($user[0]['password'] == password_verify($_POST['password'], $user[0]['password'])) {
                    $_SESSION['id'] = $user[0]['id'];
                    $_SESSION['login'] = $user[0]['login'];
                    $success[] = 'Bienvenue ' . $user[0]['login'];
                    self::render("connexion", compact("errors", "success"));
                    header('Refresh:3,' . path . 'produits');

                } else {
                    array_push($errors, 'Login ou mot de passe incorrect');
                }
            } else {
                array_push($errors, 'Login ou mot de passe incorrect');
            }

        }
        self::render("connexion", compact("errors", "success"));


    }

    public static function reset()
    {
        $error = [];
        $success = [];
        if (isset($_POST['reset'])) {
            if (!empty($_POST['email'])) {
                $user = new UtilisateursModel();
                $mail = $user->getOne('email', $_POST['email']);
                if (!empty($mail)) {
                    $mdp = uniqid();
                    echo $mdp;
                    $hashpassword= password_hash($mdp, PASSWORD_DEFAULT);
                    var_dump($modifmail=$user->updateMail('password', $hashpassword, $_POST['email']));

                    array_push($success, 'Votre nouveau mot de passe est bien envoyé');

                } else {
                    array_push($error, 'Cette addresse mail n\'est pas utilisé');
                }
            } else {
                array_push($error, "Veuillez remplir le champ");
            }
        }
        self::render("oublipass", compact('error', 'success'));
    }

}
