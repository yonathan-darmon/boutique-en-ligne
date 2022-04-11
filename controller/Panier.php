<?php
// Fait appel à PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('ASSET/PHPMailer-6.6.0/src/Exception.php');
require_once('ASSET/PHPMailer-6.6.0/src/PHPMailer.php');
require_once('ASSET/PHPMailer-6.6.0/src/SMTP.php');

class Panier extends Controller
{
    public static function sendReceipt($email, $user, $commande, $prix) //Envoi d'un reçu de commande
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Mailer = 'smtp';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'pop.cult.e.ure.boutique@gmail.com';
        $mail->Password = 'Coucousalutbonjour';
        $mail->setFrom('pop.cult.e.ure.boutique@gmail.com', "Boutique Ligne");
        $mail->addAddress($email);
        $mail->Subject = 'Merci pour votre achat!';
        $mail->WordWrap = 70;
        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Body = '<p style="font-size: 32px; color: Blue;">Votre dernier Achat</p>' . ' ' . '<p style="font-size: 52px; color: Red;">' . $user . '</p>' . '<h3 style="font-size: 20px;">Nous espérons que vous serez satisfait par les produits que vous avez acheter! <br> Les produits : ' . $commande . ' pour ' . $prix . '€</p>';
        $mail->send();
    }

    public static function index() //Check du panier & application des réduction rewards
    {
        //if(isset($_SESSION['id'])){
        $model = new paniermodel();
        $panier = $model->getProdByPanier($_SESSION['id']);
        $user = new UtilisateursModel();
        $mail = $user->getSpecific('email', $_SESSION['id']);
        $log = $user->getSpecific('login', $_SESSION['id']);
        $idreward = $user->getSpecific('id_reward', $_SESSION['id']);
        if ($idreward[0] == 2) {
            $rabais = 0.05;
        } elseif ($idreward[0] == 3) {
            $rabais = 0.10;
        } elseif ($idreward[0] == 4) {
            $rabais = 0.15;
        } elseif ($idreward[0] == 1) {
            $rabais = 1;
        }
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
                $commandemodel = new CommandesModel();

                foreach ($panier as $value) {
                    array_push($nomachat, $value['name']);

                }

                //$nomachat = $panier[0]['name']."-".$panier[1]['name'];
                $price = $paniertotal[0]['SUM((`price`)*quantity)'];
                $paiement = $_POST['paiment'];
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

                if ($reward[0] < 300) {
                    $user->update('id_reward', 1, $_SESSION['id']);
                } elseif ($reward[0] < 500 && $reward[0] > 300) {
                    $user->update('id_reward', 2, $_SESSION['id']);
                } elseif ($reward[0] < 1000 && $reward[0] > 500) {
                    $user->update('id_reward', 3, $_SESSION['id']);
                } elseif ($reward[0] > 1000) {
                    $user->update('id_reward', 4, $_SESSION['id']);

                }
                $commandes = $commandemodel->getOrder($_SESSION['id']);

                self::sendReceipt($mail[0], $log[0], $commandes[0]['achat'], $commandes[0]['price']);
                header("location:profil/historique_des_commandes");


            } else {

            }
        }
        self::render('panier', compact('panier', 'paniertotal', 'rabais'));
    }
}

?>