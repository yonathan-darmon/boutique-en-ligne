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

            if (isset($_POST['panier'])) {
                $actualid = $_SESSION['id'];
                $panier = new paniermodel();
                $panier = $produit->insert(Now(),$actualid);
            }
            
            if($produit[0]['stock'] <= 4){
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