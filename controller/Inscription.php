<?php
    class Inscription extends Controller
    {
        public static function Register()
        {
            if(isset($_POST['valider'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $passwordverify = $_POST['passwordverify'];
                $email = $_POST['email'];
                $adress = $_POST['adress'];
                if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['adress'])){
                    if($password != $passwordverify){
                        echo "verifiez votre mot de passe";
                    }
                    else{
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new Utilisateursmodel();
                    $user->insert($login,$hash,$email,$adress);
                    var_dump($user);
                    }
                    /*$userverify = $user->getOne('login', $_POST['login']);
                    if(mysqli_num_rows($userverify)){
                        exit('Ce compte existe déja');
                    }*/
                }
                else{
                    echo "Veuillez remplir les champs";
                }
                
            }
            self::render("inscription");
        }
    }

?>