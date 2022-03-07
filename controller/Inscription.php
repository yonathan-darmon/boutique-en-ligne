<?php

class Inscription extends Controller
{
    public static function Register()
    {
        $success = [];
        if (isset($_POST['valider'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $passwordverify = htmlspecialchars($_POST['passwordverify']);
            $email = htmlspecialchars($_POST['email']);
            $adress = htmlspecialchars($_POST['numero']) . '.' . htmlspecialchars($_POST['nom']) . htmlspecialchars($_POST['codepostal']) . htmlspecialchars($_POST['ville']);
            $user=new UtilisateursModel();
            $utilisateur=$user->getOne('email',$email);
            $login=$user->getOne('login',$login);
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['numero']) && !empty($_POST['nom']) && !empty($_POST['codepostal']) && !empty($_POST['ville'])) {
                if ($password != $passwordverify) {
                    $error1="verifiez votre mot de passe";
                    self::render("inscription", compact('error1'));


                } elseif (!empty($utilisateur)){
                    $error1="Cet Email est déjà utilisé pour un autre compte";
                    self::render("inscription", compact('error1'));

                }
                elseif(!empty($login)){
                    $error1="Ce nom d'utilisateur est déjà utilisé";
                    self::render("inscription", compact('error1'));
                }
                else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new Utilisateursmodel();
                    $user->insert($login, $hash, $email, $adress);
                    array_push($success, 'Vous êtes bien inscrit');
                    self::render("inscription", compact('success'));

                    header('Refresh:3, URL=' . path . 'accueil');
                }
                /*$userverify = $user->getOne('login', $_POST['login']);
                if($userverify['login']==$_POST['login']){
                    exit('Ce compte existe déja');
                }*/
            } else {
                echo "Veuillez remplir les champs";
            }

        }
        self::render("inscription",compact('success'));
    }
}


?>