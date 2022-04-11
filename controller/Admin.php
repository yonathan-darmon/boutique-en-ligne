<?php

class Admin extends Controller
{
    public function __construct()
    {

    }

    public static function index() // Permet à l'admin de gérer les utilisateurs & les stocks
    {
        $user = new UtilisateursModel();
        $utilisateur = count($user->getALL());
        $product = new HistoriqueModel();
        $produit = count($product->getALL());
        $stock = new ProduitsModel();
        $stocklow = $stock->getLowStock();
        self::renderAdmin('admin', compact('utilisateur', 'produit', 'stocklow'));
    }

    public static function stock() // Affiche les stocks pour l'admin
    {
        $stock = new ProduitsModel();
        $rendstock = ($stock->stock());
        //$addstock = $stock->update('stock', );
        self::renderAdmin('adminstock', compact('rendstock'));
    }

    public static function adStock() // Permet à l'admin de modifier du stock
    {
        $params = explode('/', $_GET['p']);
        $stock = new ProduitsModel();
        $addstock = ($stock->getOne('id', $params[2]));
        if (isset($_POST['ad'])) {
            $stock->upstock($params[2], $_POST['num']);
            header('location:' . path . 'admin');
        } else {
            self::renderadmin('adminadstock', compact('addstock'));

        }
    }

    public static function user() // Affiche les utilisateurs pour l'admin
    {
        $user = new UtilisateursModel();
        $utilisateur = ($user->getALL());
        self::renderAdmin('adminuser', compact('utilisateur'));
    }

    public static function manageUser() // Permet à l'admin de gérer les droits d'utilisateurs
    {
        $params = explode('/', $_GET['p']);
        $user = new UtilisateursModel();
        $droits = new DroitsModel();
        $utilis=$user->getOne('id',$params[2]);
        $droit = $droits->getOne("id", $utilis[0]['id_droit']);
        if (isset($_POST['modif'])){
             $manage = ($user->update('id_droit',$_POST['droit'], $params[2]));

        }
        self::renderAdmin('manageuser', compact('utilis','droit'));
    }

    public static function articles() // Permet à l'admin d'ajouter du stock
    {
        $cat = new CategorieModel();
        $cat2 = new SouscategorieModel();
        $catego=$cat->getALL();
        $souscateg = $cat2->getALL();

        if(isset($_POST['ajouter'])){
        $nom = $_POST['nom'];
        $prix = $_POST['price'];
        $stock = $_POST['stock'];
        $promo = $_POST['promo'];
        $image = $_POST['image'];
        $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];
        $push = $_POST['push'];
        $short = $_POST['short'];
        $long = $_POST['long'];
        $tags = $_POST['tags'];
        $getcat = $cat->getOne('id_categorie', 'name_categories');
        $cats = $getcat[0]['id'];
        $getsouscat = $cat2->getOne('id_categorie', 'name');
        $sousCat = $getsouscat[0]['id'];
        $add = new ProduitsModel();
        $add->addProd($nom, $prix, $stock, $promo, $image, $image2, $image3, $push, $short, $long, $tags, $cat, $sousCat);
        }
    
        self::renderAdmin('adminarticles', compact('catego', 'souscateg'));
    }

    public static function ventes() // Affiche les ventes
    {
        $product = new HistoriqueModel();
        $produit = ($product->getALL());
        self::renderAdmin('adminventes', compact('produit'));
    }

    public static function categories() // Permet à l'admin d'ajouter des catégories et sous catégories
    {
        
        $cat = new CategorieModel();
        $catego=$cat->getALL();
        if(isset($_POST['add'])){
            $cat -> addCat($_POST['nom']);
        }
        $cat2 = new SouscategorieModel();
        if(isset($_POST['add2'])){
            $cat2 -> addSousCat($_POST['nom'], $_POST['id_cat']);
        }
        self::renderAdmin('admincategories', compact('catego'));
    }

}

?>