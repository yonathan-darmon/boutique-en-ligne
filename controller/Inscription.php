<?php

class Inscription extends Controller
{
    public static function Register()
    {
        $array = array("bonjour", "bonsoir", "harry potter");
        shuffle($array);
        foreach ($array as $array) {
            echo "$array";
        }

        if (isset($_POST['valider'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $passwordverify = htmlspecialchars($_POST['passwordverify']);
            $email = htmlspecialchars($_POST['email']);
            $adress = htmlspecialchars($_POST['numero']).'.'.htmlspecialchars($_POST['nom']).htmlspecialchars($_POST['codepostal']).htmlspecialchars($_POST['ville']);
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['numero']) && !empty($_POST['nom']) && !empty($_POST['codepostal']) && !empty($_POST['ville'])) {
                if ($password != $passwordverify) {
                    echo "verifiez votre mot de passe";
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new Utilisateursmodel();
                    $user->insert($login, $hash, $email, $adress);
                    header('location:'.path.'connexion');
                }
                /*$userverify = $user->getOne('login', $_POST['login']);
                if($userverify['login']==$_POST['login']){
                    exit('Ce compte existe déja');
                }*/
            } else {
                echo "Veuillez remplir les champs";
            }

        }
        self::render("inscription");
    }
}


?>