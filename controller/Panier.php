<?php

    class Panier extends Controller
    {
        public static function index()
        {         
            if(isset($_SESSION['id'])){
                $model = new paniermodel();
                $panier = $model->getAll();
                var_dump($panier);
                //$panier = $model->getInnerJoin('products', 'id_product', 'id', 'id_product', $_SESSION['id']);
            }
            $paniertotal = $model->total();

            //supprimer le panier
            if(isset($_POST['supprimer'])){
                $panier = $model->deletecart($panier[0]['id']);
                //header('Refresh:2,' . path . 'panier');
            }

            //modifier la quantité du panier
            if(isset($_POST['modifquantity'])){
                $quantity = htmlspecialchars($_POST['quantity']);
                $model->update('quantity', $quantity, $panier[0]['id']);
            }

            //fonction pour pouvoir payer
            if(isset($_POST['button']) && !empty($_POST['prix'])){
                require 'vendor/autoload.php';
                $prix = $_POST['prix'];
                
                //on instancie stripe
                \Stripe\Stripe::setApiKey('sk_test_51Kb39iC5Di6WbNI4XF9KPchnOZOxF0x8XIIADxhzlGVgAoBL7oL9T0GUsyOO2fDaVWhOqDFjeo1bxHDuHc27XYP700BKvleeR3');
                $intent = \Stripe\PaymentIntent::create([
                    'amount' => $prix*100,
                    'currency' => 'eur'
                ]);

                $output = [
                    'clientSecret' => $intent->client_secret,
                ];
                
                $panier = $model->deletecart($_SESSION['id']);
                $produitmodel = new produitsmodel();
                $stock = $produitmodel->update('stock', 'stock'-$quantity, $panier[0]['id']);
            }
            self::render('panier', compact('panier', 'paniertotal'));
        }
    }
?>