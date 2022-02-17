<?php
    class Inscription extends Controller
    {
        public static function Register()
        {
            if(isset($_POST['valider'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $adress = $_POST['adress'];
                if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['adress'])){
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new Utilisateursmodel();
                    $user->insert($login,$hash,$email,$adress);
                    var_dump($user);
                }
                else{
                    echo "Veuillez remplir les champs";
                }
                
            }
            self::render("inscription");
        }
    }

?>