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
                //$produit[0]['stock'] - 1;
            }
            
            if($produit[0]['stock'] <= 4){
                echo "stock faible";
            }

            $commentaire = new commentairemodel();
            $comments = $commentaire->getOne('id_product', $params);
            $comments = $commentaire->getInnerJoin('user','id_user','id','id_product',$params);
            $comments = $commentaire->average('id_product', $params);

            if (isset($_POST['valider'])) {
                $commentverify = htmlspecialchars($_POST['commentaire']);
                $idproduct = $produit[0]['price'];
                $rating = $_POST['rating'];
                $commentaire->insert($commentverify,$rating,$idproduct,$actualid);
            }

            self::render('article', compact('produit', 'comments'));
        }else{
            header('location:'.path.'produits');
        }
    }
}

?>