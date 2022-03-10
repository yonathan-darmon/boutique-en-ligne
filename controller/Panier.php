<?php

    class Panier extends Controller
    {
        public static function index()
        {         
            if(isset($_SESSION['id'])){
                $model = new paniermodel();
                $panier = $model->getOne('id_user', $_SESSION['id']);
                var_dump($panier);
                //$panier = $model->getInnerJoin('products', 'id_products', 'id', 'id_user');
            }

            if(isset($_POST['supprimer'])){
                $panier = $model->delete($panier[0]['id_user']);
                //header('Refresh:2,' . path . 'panier');
            }
            if(isset($_POST['modifquantity'])){
                $quantity = htmlspecialchars($_POST['quantity']);
                $model->update('quantity', $quantity, $_SESSION['id']);
            }
            self::render('panier', compact('panier'));
        }
    }
?>