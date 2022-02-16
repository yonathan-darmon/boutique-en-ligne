<?php


class Utilisateurs extends Controller
{
    public function isLoginExist($login)
    {
        $model = new utilisateursmodel();
        $exist = $model->getOne('login', $login);
        return $exist;

    }

    public function connect($login, $password)
    {
        $login =$this->isLoginExist($login);
        $model= new utilisateursmodel();
        $password= $model->getOne('password', $password);
        if($login== true && $password == true){
            $_SESSION['id']=$password['id'];
            $_SESSION['login']=$login;
            header("location : index.php");
        }
        else{
            $error1="Veuillez verifier votre mot de passe";
            return $error1;
        }
    }
}