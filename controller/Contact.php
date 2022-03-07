<?php


class Contact extends Controller {
    public function __construct()
    {

    }

    public static function index()
    {
        self::sendmail();
        self::render('contact');
    }
}
    ?>