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
        if (isset($_POST['supprimer'])) {
            $panier = $model->deletecart($panier[0]['id']);
            header("Refresh:0");
        }

        //modifier la quantité du panier
        if (isset($_POST['modifquantity'])) {
            $quantity = htmlspecialchars($_POST['quantity']);
            $model->update('quantity', $quantity, $_POST['id']);
            header("Refresh:0");
        }

        //fonction pour pouvoir payer
        if (isset($_POST['button'])) {
            if (!empty($panier)) {
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


                //modifie le stock
                $produitmodel = new produitsmodel();
                $stockquantity = $panier[0]['quantity'];
                //$stock = $produitmodel->update('stock', 'stock'-$stockquantity, $panier[0]['id']);

                //insert les données dans la table commandes
                $nomachat = [];
                foreach ($panier as $value) {
                    array_push($nomachat, $value['name']);

                }

                //$nomachat = $panier[0]['name']."-".$panier[1]['name'];
                $price = $paniertotal[0]['SUM((`price`)*quantity)'];
                $paiement = $_POST['paiment'];
                $commandemodel = new CommandesModel();
                $name = implode(';', $nomachat);
                $commandes = $commandemodel->insert($name, $price, $paiement, $_SESSION['id']);
                $prod = $model->getProdByPanier($_SESSION['id']);
                $historiquemodel = new historiquemodel();

                //insert les données dans la table historique

                foreach ($prod as $value) {
                    $commandes = $commandemodel->getOrder($_SESSION['id']);
                    $idcommande = $commandes[0]['id'];
                    $nom = $value['name'];
                    $prices = $value['prix'];
                    $quantite = $value['quantity'];

                    $historiques = $historiquemodel->insert($nom, $quantite, $prices, $paiement, $idcommande, $_SESSION['id']);


                }

                //supprime le panier à l'achat
                $pan = $model->delete($_SESSION['id']);
                $histo = $historiquemodel->getOne('id_user', $_SESSION['id']);
                $reward = $historiquemodel->sumPay($_SESSION['id']);
                var_dump($reward);
                // header("Refresh:0");


            }else{

            }
        }
        self::render('panier', compact('panier', 'paniertotal'));
    }
}

?>