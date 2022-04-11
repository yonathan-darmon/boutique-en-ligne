<?php


class Contact extends Controller {
    public function __construct()
    {

    }

    public static function index() //Envoi de mail 
    {
        self::sendmail();
        self::render('contact');
    }
}
    ?>