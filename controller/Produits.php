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
      $search="";
        if(isset($_POST['search'])) {
            $search = $model->searchBar($_POST['input-search']);
            if($produits = $search); 
        } else ($produits = $model->getProdByDate());

        $pages = count($produits) / 6;
        $pages = ceil($pages);
        if (isset ($_POST['achat'])) {
            if (isset($_SESSION['id'])) {
                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));
            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'error1'));
            }
        }

        if (isset($_POST['delete'])) {
            $panier = new PanierModel();
            $panier->delete($_SESSION['id']);
        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'search'));

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
            if (isset($_SESSION['id'])) {
                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'error1'));
            }
        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));

    }

    public
    static function selectByCat($cat)
    {
        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $model = new ProduitsModel();
        $produits = $model->getProdByCat($cat);
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();
        $pages = count($produits) / 6;
        $pages = ceil($pages);
        if (isset ($_POST['achat'])) {
            if (isset($_SESSION['id'])) {

                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'error1'));
            }
        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));
    }

}