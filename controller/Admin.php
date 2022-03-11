<?php

class Admin extends Controller 
{
    public function __construct()
    {
        
    }

    public static function index()
    {
       $user=new UtilisateursModel();
       $utilisateur=count($user->getALL());
       $product=new HistoriqueModel();
       $produit=count($product->getALL());
       $stock=new ProduitsModel();
       $stocklow=$stock->getLowStock();
        self::renderAdmin('admin',compact('utilisateur','produit','stocklow'));
    }

    public static function stock ()
    {
        $stock = new ProduitsModel();
        $rendstock = ($stock->stock());
        //$addstock = $stock->update('stock', );
        self::renderAdmin('adminstock', compact('rendstock'));
    }
    public static function adStock($params)
    {
        $stock = new ProduitsModel();
        $addstock = ($stock ->getOne('id', $params));
        self::renderAdmin('adminadstock', compact('addstock'));
    }

    public static function upstock()
    {
        $stock = new ProduitsModel();
        $upstock = ($stock->upstock());
        self::renderAdmin('adminadstock', compact('upstock'));
    }

    public static function user ()
    {
        $user=new UtilisateursModel();
        $utilisateur=($user->getALL());
        self::renderAdmin('adminuser', compact('utilisateur'));
    }

    public static function articles ()
    {
        $nom =
        $prix =
        $stock = 
        $promo = 
        $push = 
        $short = 
        $long = 
        $tags = 
        $add = new ProduitsModel();
        $addprod = $add->addProd($nom, $prix, $stock, $promo, $push, $short, $long, $tags);
        self::renderAdmin('adminarticles', compact('addprod'));
    }

    public static function ventes ()
    {
        $product=new HistoriqueModel();
        $produit=($product->getALL());
        self::renderAdmin('adminventes', compact('produit'));
    }

    public static function categories ()
    {
        self::renderAdmin('admincategories');
    }

}

?>