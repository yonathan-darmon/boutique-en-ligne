<?php
class Profil extends Controller
{
    public function __construct()
    {
    }

    public static function index()
    {
        $user= new UtilisateursModel();
        $utilisateur=$user->getOne('id',$_SESSION['id']);
        self::render('profil', compact('utilisateur'));
    }
}