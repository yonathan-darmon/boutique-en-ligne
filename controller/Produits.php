<?php


class Produits extends Controller
{
    public function __construct()
    {

    }

    public static function index()
    {
        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();
        $model = new Produitsmodel();
        $produits = $model->getALL();
        $pages = count($produits) / 6;
        $pages = ceil($pages);
        if (isset ($_POST['achat'])) {
            $produit = $model->getOne('id', $_POST['hidden']);
            $panier = new PanierModel();
            $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

        }

        if (isset($_POST['delete'])) {
            $panier = new PanierModel();
            $panier->delete($_SESSION['id']);
        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));

    }

    public static function selectBySc($cat)
    {

        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();
        $model = new Produitsmodel();
        $produits = $model->getProdBySc($cat);
        $pages = count($produits) / 6;
        $pages = ceil($pages);
        if (isset ($_POST['achat'])) {
            $produit = $model->getOne('id', $_POST['hidden']);
            $panier = new PanierModel();
            $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));

    }

    public  static function selectByCat($cat)
    {
            $modelcat = new CategorieModel();
            $modelsc = new SouscategorieModel();
            $model=new ProduitsModel();
            $produits=$model->getProdByCat($cat);
            $categorie = $modelcat->getALL();
            $scategorie = $modelsc->getALL();
            $pages = count($produits) / 6;
            $pages = ceil($pages);
        if (isset ($_POST['achat'])) {
            $produit = $model->getOne('id', $_POST['hidden']);
            $panier = new PanierModel();
            $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

        }
            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));
    }

}
