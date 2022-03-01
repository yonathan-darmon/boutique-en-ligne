<?php
class Accueil extends Controller {
    public function __construct()
    {

    }
    public static function index()
    {
        $prod = new ProduitsModel;
        $produit = $prod -> getProd();
        self::render('accueil', compact('produit'));

    }

    public static function index2()
    {
        $prod2 = new ProduitsModel;
        $produit2 = $prod2 -> getProdByDate();
        self::render('accueil', compact('produit'));

    }
}
