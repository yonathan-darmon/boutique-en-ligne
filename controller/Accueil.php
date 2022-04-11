<?php
class Accueil extends Controller {
    public function __construct()
    {

    }
    public static function index() // Permet de chercher & générer les produits sur la page d'accueil
    {
        $prod = new ProduitsModel;
        $produit = $prod -> getProdByDate();
        $promo = $prod -> promoProd();
        $avant = $prod -> pushProd();
        self::render('accueil', compact('produit', 'promo', 'avant'));

    }
}
