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

    }

}

?>