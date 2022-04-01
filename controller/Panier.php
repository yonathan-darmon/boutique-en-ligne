<?php

    class Panier extends Controller
    {
        public static function index()
        {         
            //if(isset($_SESSION['id'])){
                $model = new paniermodel();
                $panier = $model->getProdByPanier($_SESSION['id']);
                var_dump($panier);
            //}

            //prix total du panier
            $paniertotal = $model->total();

            //supprimer le panier
            if(isset($_POST['supprimer'])){
                $panier = $model->deletecart($panier[0]['id']);
                header("Refresh:0");
            }

            //modifier la quantité du panier
            if(isset($_POST['modifquantity'])){
                $quantity = htmlspecialchars($_POST['quantity']);
                $model->update('quantity', $quantity, $panier[0]['id']);
                header("Refresh:0");
            }

            //fonction pour pouvoir payer
            if(isset($_POST['button'])){
                header("Refresh:0");
                //require 'vendor/autoload.php';
                
                
                //on instancie stripe
                /*\Stripe\Stripe::setApiKey('sk_test_51Kb39iC5Di6WbNI4XF9KPchnOZOxF0x8XIIADxhzlGVgAoBL7oL9T0GUsyOO2fDaVWhOqDFjeo1bxHDuHc27XYP700BKvleeR3');
                $intent = \Stripe\PaymentIntent::create([
                    'amount' => $paniertotal*100,
                    'currency' => 'eur',
                ]);

                $output = [
                    'clientSecret' => $intent->client_secret,
                ];*/
                
                //supprime le panier à l'achat
                $mod = new paniermodel();
                $pan = $mod->delete($_SESSION['id']);
                
                //modifie le stock
                $produitmodel = new produitsmodel();
                $stockquantity = $panier[0]['quantity'];
                //$stock = $produitmodel->update('stock', 'stock'-$stockquantity, $panier[0]['id']);

                //insert les données dans la table commandes
                $nomachat=[];
                foreach($panier as $value){
                    array_push($nomachat,$value['name']);

                }

               //$nomachat = $panier[0]['name']."-".$panier[1]['name'];
                $price = $paniertotal[0]['SUM((`price`)*quantity)'];
                $paiement = $_POST['paiment'];
                $commandemodel = new commandesmodel();
                $name=implode(';',$nomachat);
                $commandes = $commandemodel->insert($name ,$price, $paiement, $_SESSION['id']);

                //insert les données dans la table historique
                foreach ($nomachat as $value) {
                 $commandes = $commandemodel->getOne('id', $_SESSION['id']);
                $idcommande = $commandes[0]['id'];
                $prices = $panier[0]['price'];
                $quantite = $panier[0]['quantity'];
                $historiquemodel = new historiquemodel();
                $historiques = $historiquemodel->insert($value ,$quantite ,$prices ,$paiement ,$idcommande ,$_SESSION['id']);
                }
                
            }
            self::render('panier', compact('panier', 'paniertotal'));
        }
    }
?>