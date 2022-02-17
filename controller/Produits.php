<?php


class Produits extends Controller
{
    public function __construct()
    {

    }

    public static function index()
    {
        $model = new produitsmodel();
        $produits = $model->getALL();
        self::render('produits', compact('produits'));

    }
}
