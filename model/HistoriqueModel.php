<?php

class HistoriqueModel extends Model
{
    public function __construct()
    {
        $this->table = "historique"; // Connexion à la bdd
        $this->getConnection();
    }

    public function getHisto($value) 
    {
        $sth = $this->_connexion->prepare("SELECT historique.product_name AS Nom_du_produit,historique.quantity AS Quantite, historique.prices AS Prix,historique.moyen_de_paiement AS Moyen_de_paiement, DATE_FORMAT(commandes.date, '%d/%m/%Y') AS Date  FROM  $this->table  INNER JOIN commandes on historique.id_commande=commandes.id WHERE historique.id_user=?");
        $sth->execute(array($value));
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function insert($product_name, $quantity, $prices, $moyen_de_paiement, $id_commande, $id_user)
    {
        $sth = $this->_connexion->prepare("INSERT INTO historique(product_name, quantity, prices, moyen_de_paiement, date, id_commande, id_user) VALUES (?,?,?,?,Now(),?,?)");
        $sth->execute(array($product_name, $quantity, $prices, $moyen_de_paiement, $id_commande, $id_user));
    }

    public function updatePrice($value,$nom)
    {
        $sth=$this->_connexion->prepare("UPDATE `historique` SET prices=$value WHERE product_name='$nom' AND  TIMEDIFF(CURTIME(), `date`) < '00:10'");
        $r="UPDATE `historique` SET prices=$value WHERE product_name='$nom' AND  TIMEDIFF(CURTIME(), `date`) < '00:10'";
        var_dump($r);
        $sth->execute();
    }

    public function sumPay($id)
    {
        $sth=$this->_connexion->prepare('SELECT SUM(prices) FROM historique WHERE id_user=?');
        $sth->execute(array($id));
        return $sth->fetch();
    }
}