<?php


    class Article extends Controller
    {
        public function __construct()
        {

        }

        public static function index()
        {
            $article = new produitsmodel();
            $produit = $article->getOne('id', 'name');
            self::render('article');

            if(isset($_POST['panier'])){
                $actuallogin = $_SESSION['login'];
                $actualid = $_SESSION['id'];
                $panier->insert();
                //$panier = $this->query('INSERT INTO commandes (date,price,moyen_paiement,id_user,id_cart) VALUES (NOW(), , ,'$actualid',)');
            }
            if('stock' <= 4){
                echo "stock faible";
            }

            $commentaire = new commentairemodel();
            $comments = $commentaire->getOne('comment','date');
        }
    }
?>