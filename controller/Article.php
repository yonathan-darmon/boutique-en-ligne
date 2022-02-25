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
                $idproduct = $produit[0]['id_product'];
                $price = $produit[0]['price'];
                $panier = new paniermodel();
                $panier = $produit->insert($idproduct,$price,$actualid);
            }
            
            if($produit[0]['stock'] <= 4){
                echo "stock faible";
            }

            $commentaire = new commentairemodel();
            $comments = $commentaire->getALL();
            if (isset($_POST['valider'])) {
                $commentverify = $_POST['commentaire'];
                $idproduct = $produit[0]['price'];
                $commentaire->insert($commentverify,$idproduct,$actualid);
            }

            self::render('article', compact('produit', 'comments'));
        }else{
            header('location:'.path.'produits');
        }
    }
}

?>