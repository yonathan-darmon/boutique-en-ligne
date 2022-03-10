<?php

class Admin extends Controller 
{
    public function __construct()
    {
        
    }

    public static function index()
    {
        $nom =
        $prix = 
        $stock =
        $promo =
        $push =
        $short = 
        $long = 
        $tags =
        $add = new ProduitsModel;
        $addprod = $add ->addProd($nom, $prix, $stock, $promo, $push, $short, $long, $tags);
        self::renderAdmin('admin');
    }

}

?>