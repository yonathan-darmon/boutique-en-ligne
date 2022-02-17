<?php
    class Inscription extends Controller
    {
        public function Register($login, $password, $email, $adress)
        {
            if(isset($_POST['valider'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $adress = $_POST['adress'];
                if(!empty($login) && ($password) && ($email) && ($adress)){
                    header('Location:./Connexion.php');
                }
                else{
                    echo "Veuillez remplir les champs";
                }
                $sth = $this->_connexion->prepare("INSERT INTO user (login, password, email, adress) VALUES ('$login', '$password', '$email', '$adress')");
                $sth->execute();
            }
        }
    }

?>