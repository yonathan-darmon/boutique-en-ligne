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
        $produits = $model->getProdByDate(6);
        self::render('produits', compact('produits', 'categorie','scategorie'));

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
            self::render('produits', compact('produits', 'categorie', 'scategorie'));

        } else {
            $modelcat = new CategorieModel();
            $modelsc = new SouscategorieModel();
            $categorie = $modelcat->getALL();
            $scategorie = $modelsc->getALL();
            $model = new produitsmodel();
            $produits = $model->getProdBySc($cat);
            $model = new produitsmodel();
            $produits = $model->getPagination();
            $pages = $produits[0][0] /6;
            $pages = ceil($pages);
            self::render('produits', compact('produits', 'categorie', 'scategorie'));
        }
    }

}
