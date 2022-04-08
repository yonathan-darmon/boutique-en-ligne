<?php


class Produits extends Controller
{
    public function __construct()
    {

    }

    public static function index()
    {
        $nombreArticlePages = 6;
        $model = new Produitsmodel();
        $params = explode('/', $_GET['p']);
        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();
        $search = "";
        if (isset($_POST['search'])) {
            $nombreDePagesSearch=$model->totalPageSearch($_POST['input-search']);
            $nombreDePages=ceil($nombreDePagesSearch[0]/$nombreArticlePages);
            $search = $model->searchBar($_POST['input-search']);
            $prod = $search;
        } else {
            $totalArticles = $model->nombreTotalArticles();
            $nombreDePages = ceil($totalArticles[0] / $nombreArticlePages);


            if (isset($params[1]) && is_numeric($params[1])) {

                $pages = $params[1];
                $premierArticle = ($pages - 1) * $nombreArticlePages;
                $prod = $model->getArticleForProduct($premierArticle, $nombreArticlePages);
            } elseif (isset($params[2]) && is_numeric($params[2])) {
                $pages = $params[2];
                $premierArticle = ($pages - 1) * $nombreArticlePages;

                $prod = $model->getArticleForProduct($premierArticle, $nombreArticlePages);

            } else {
                $pages = 1;
                $premierArticle = ($pages - 1) * $nombreArticlePages;
                $prod = $model->getArticleForProduct($premierArticle, $nombreArticlePages);
            }
        }

        if (isset ($_POST['achat'])) {
            if (isset($_SESSION['id'])) {
                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'produit', 'nombreDePages'));
            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'error1', 'nombreDePages'));
            }
        }

        if (isset($_POST['delete'])) {
            $panier = new PanierModel();
            $panier->delete($_SESSION['id']);
        }
        self::render('produits', compact('categorie', 'scategorie',  'search', 'nombreDePages', 'prod'));

    }

    public static function selectBySc($cat)
    {
        $params = explode('/', $_GET['p']);
        $nombreArticlePages = 6;
        $model = new Produitsmodel();
        $totalArticles = $model->nombreTotalArticleSC($cat);
        $nombreDePages = ceil($totalArticles[0] / $nombreArticlePages);

        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();


        if (isset($params[1]) && is_numeric($params[1])) {
            $pages = $params[1];
            $premierArticle = ($pages - 1) * $nombreArticlePages;
            $prod = $model->getArticleForProductSc($params[1],$premierArticle, $nombreArticlePages);
        } elseif (isset($params[2]) && is_numeric($params[2])) {
            $pages = $params[2];
            $premierArticle = ($pages - 1) * $nombreArticlePages;
            $prod = $model->getArticleForProductSc($params[1],$premierArticle, $nombreArticlePages);


        } else {
            $pages = 1;
            $premierArticle = ($pages - 1) * $nombreArticlePages;
            $prod = $model->getArticleForProductSc($params[1],$premierArticle, $nombreArticlePages);

        }

        if (isset ($_POST['achat'])) {
            if (isset($_SESSION['id'])) {
                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'produit', 'nombreDePages'));

            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'error1', 'nombreDePages'));
            }
        }
        self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'nombreDePages'));

    }

    public
    static function selectByCat($cat)
    {
        $params = explode('/', $_GET['p']);
        $nombreArticlePages = 6;
        $model = new Produitsmodel();
        $totalArticles = $model->nombreTotalArticleCat($cat);
        $nombreDePages = ceil($totalArticles[0] / $nombreArticlePages);
        $modelcat = new CategorieModel();
        $modelsc = new SouscategorieModel();
        $produits = $model->getProdByCat($cat);
        $categorie = $modelcat->getALL();
        $scategorie = $modelsc->getALL();

        if (isset($params[1]) && is_numeric($params[1])) {
            $pages = $params[1];
            $premierArticle = ($pages - 1) * $nombreArticlePages;
            $prod = $model->getArticleForProductCat($params[1],$premierArticle, $nombreArticlePages);
        } elseif (isset($params[2]) && is_numeric($params[2])) {
            $pages = $params[2];
            $premierArticle = ($pages - 1) * $nombreArticlePages;

            $prod = $model->getArticleForProductCat($params[1],$premierArticle, $nombreArticlePages);


        } else {
            $pages = 1;
            $premierArticle = ($pages - 1) * $nombreArticlePages;
            $prod = $model->getArticleForProductCat($params[1],$premierArticle, $nombreArticlePages);

        }
        if (isset ($_POST['achat'])) {
            if (isset($_SESSION['id'])) {

                $produit = $model->getOne('id', $_POST['hidden']);
                $panier = new PanierModel();
                $panier->insert($produit[0]['id'], $produit[0]['price'], $_SESSION['id']);

                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'produit', 'nombreDePages'));

            } else {
                $error1 = "Vous devez etre connecté pour acheter un produit";
                self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'error1', 'nombreDePages'));
            }
        }
        self::render('produits', compact('prod', 'categorie', 'scategorie', 'pages', 'nombreDePages'));
    }

}