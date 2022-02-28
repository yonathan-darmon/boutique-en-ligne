<?php
class Accueil extends Controller {
    public function __construct()
    {

    }
    public static function index()
    {
        $prod = new ProduitsModel;
        $produit = $prod -> getProdByDate();
        self::render('accueil', compact('produit'));

    }
}
