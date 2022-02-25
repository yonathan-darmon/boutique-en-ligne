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
                $panier = new paniermodel();
                $panier = $produit->insert(Now(),$actualid);
            }
            
            if($produit['stock'] <= 4){
                echo "stock faible";
            }

            $commentaire = new commentairemodel();
            $comments = $commentaire->getALL();
            if (isset($_POST['valider'])) {
                $commentverify = $_POST['commentaire'];
                $commentaire->insert($commentverify,NOW(),$actualid);
            }

            self::render('article', compact('produit', 'comments'));
        }else{
            header('location:'.path.'produits');
        }
    }
}

?>