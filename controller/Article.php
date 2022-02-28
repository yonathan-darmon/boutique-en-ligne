<?php


class Article extends Controller
{
    public function __construct()
    {

    }

    public static function index($params)
    {
        $article = new produitsmodel();
        $produit = $article->getOne('id', $params);
        if (!empty($produit)) {

            //var_dump($produit);

            if (isset($_POST['panier'])) {
                $actuallogin = $_SESSION['login'];
                $actualid = $_SESSION['id'];
                $panier->insert();
                //$panier = $this->query('INSERT INTO commandes (date,price,moyen_paiement,id_user,id_cart) VALUES (NOW(), , ,'$actualid',)');
            }
            /*if('stock' <= 4){
                echo "stock faible";
            }*/

            $commentaire = new commentairemodel();
            $comments = $commentaire->getALL();
            if (isset($_POST['valider'])) {
                $comm = $_POST['commentaire'];
                $commentaire->insert();
            }

            self::render('article', compact('produit', 'comments'));
        }else{
            header('location:'.path.'produits');
        }
    }
}

?>