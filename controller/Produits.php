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
        if (isset ($_POST['achat'])){
            $produit=$model->getOne('id',$_POST['hidden']);
            $panier=new PanierModel();
            $panier->insert($produit[0]['id'],$produit[0]['price'],$_SESSION['id']);

            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages', 'produit'));

        }
        self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));

    }

    public static function selectBySc($cat)
    {
        if (isset($_POST['choix'])) {
            $modelcat = new CategorieModel();
            $produits = $modelcat->getInnerJoin('products', 'id', 'id_categorie', 'categories.name', $_POST['filtre']);
            $modelcat = new CategorieModel();
            $modelsc = new SouscategorieModel();
            $categorie = $modelcat->getALL();
            $scategorie = $modelsc->getALL();
            $pages = count($produits) / 6;
            $pages = ceil($pages);
            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));

        } else {
            $modelcat = new CategorieModel();
            $modelsc = new SouscategorieModel();
            $categorie = $modelcat->getALL();
            $scategorie = $modelsc->getALL();
            $model = new produitsmodel();
            $produits = $model->getProdBySc($cat);
            $model = new produitsmodel();
            $produits = $model->getPagination();
            $pages = count($produits) / 6;
            $pages = ceil($pages);
            self::render('produits', compact('produits', 'categorie', 'scategorie', 'pages'));
        }
    }

}
