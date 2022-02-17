<?php


class Connexion extends Controller
{
    public function isLoginExist($login)
    {
        $model = new utilisateursmodel();
        $exist = $model->getOne('login', $login);
        return $exist;

    }

    public function index()
    {
        $this->loadModel("utilisateursmodel");
        $user = $this->utilisateursmodel->getAll();
        $this->render("connexion",compact('user'));


    }
    public function connect($login, $password)
    {
        $user = $this->isLoginExist($login);
        $model = new utilisateursmodel();
        $password = $model->getOne('password', $password);
        if ($user == true && $password == true) {
            $this->id = $password['id'];
            $_SESSION['id'] = $password['id'];
            $_SESSION['login'] = $login;
        } else {
            $error1 = "Veuillez verifier votre mot de passe";
            return $error1;
        }
    }

}