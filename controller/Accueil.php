<?php
class Accueil extends Controller {
    public function __construct()
    {

    }
    public static function index()
    {
        $prod = new ProduitsModel;
        $produit = $prod -> getProdByDate();
        $promo = $prod -> promoProd();
        $avant = $prod -> pushProd();
        self::render('accueil', compact('produit', 'promo', 'avant'));

    }
}
