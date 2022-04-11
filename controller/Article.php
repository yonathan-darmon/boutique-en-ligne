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
                $idproduct = $produit[0]['id'];
                $price = $produit[0]['price'];
                $panier = new PanierModel();
                $panier->insert($idproduct, $price, $actualid);
            }

            if ($produit[0]['stock'] <= 4) {
                echo "stock faible";
            }

            $commentaire = new commentairemodel();
            $comments = $commentaire->getOne('id_product', $params);
            $comments = $commentaire->getInnerJoin('user', 'id_user', 'id', 'id_product', $params);
            $idproduct = $produit[0]['id'];
            $commentsaverage = $commentaire->average($idproduct);

            if (isset($_POST['valider'])) {
                $commentverify = htmlspecialchars($_POST['commentaire']);
                $idproduct = $produit[0]['id'];
                $rating = $_POST['rating'];
                $commentaire->insert($commentverify, $rating, $idproduct, $_SESSION['id']);
            }

            self::render('article', compact('produit', 'comments', 'commentsaverage'));
        } else {
            header('location:' . path . 'produits');
        }
    }
}

?>