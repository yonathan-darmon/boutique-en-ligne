<?php

    class Panier extends Controller
    {
        public static function index()
        {         
            if(isset($_SESSION['id'])){
                $model = new paniermodel();
                $panier = $model->getAll();
                //var_dump($panier);
                //$panier = $model->getInnerJoin('products', 'id_products', 'id', 'id_user');
                self::render('panier', compact('panier'));
            }
        }
    }
?>