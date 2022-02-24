<?php
class Accueil extends Controller {
    public function __construct()
    {

    }
    public static function index()
    {

        self::render('accueil');

    }
}
