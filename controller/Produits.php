<?php


class Produits extends Controller
{
    public function __construct()
    {

    }

    public static function index()
    {

        $model = new Produitsmodel();
        $produits = $model->getALL();
        self::render('produits', compact('produits'));

    }

    public static function selectBySc($cat)
    {
        $model = new produitsmodel();
        $produits = $model->getProdBySc($cat);
        self::render('produits', compact('produits'));
    }
}
