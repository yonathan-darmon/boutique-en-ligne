<?php

    class Panier extends Controller
    {
        public static function index()
        {         
            if(isset($_SESSION['id'])){
                $model = new paniermodel();
                $panier = $model->getAll();
                var_dump($panier);
                //$panier = $model->getInnerJoin('products', 'id_products', 'id', 'id_user');
            }

            if(isset($_POST['supprimer'])){
                $panier = $model->delete($_SESSION['id']);
                header('Refresh:2,' . path . 'panier');
            }
            if(isset($_POST['modifquantite'])){
                $quantity = $_POST['quantity'];
                $panier = $model->update('quantity', $quantity, 'id_product');
            }
            self::render('panier', compact('panier'));
        }
    }
?>