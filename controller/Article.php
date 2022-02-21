<?php


    class Article extends Controller
    {
        public function __construct()
        {

        }

        public static function pan()
        {
            $article = new produitsmodel();
            $produit = $article->getOne('id', 'name');
            self::render('article', compact('article'));
        }

        public static function panier()
        {
            if(isset($_POST['panier'])){
                $actuallogin = $_SESSION['login'];
                $actualid = $_SESSION['id'];
                $panier = $this->query('INSERT INTO commandes (date,price,moyen_paiement,id_user,id_cart) VALUES (NOW(), , ,'$actualid',)');
            }
        }
    }
?>