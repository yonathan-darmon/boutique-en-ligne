<?php

class HistoriqueModel extends Model
{
    public function __construct()
    {
        $this->table = "historique";
        $this->getConnection();
    }

    public function getHisto($value)
    {
        $sth = $this->_connexion->prepare("SELECT historique.product_name AS Nom_du_produit,historique.quantity AS Quantite, historique.prices AS Prix,historique.moyen_de_paiement AS Moyen_de_paiement, DATE_FORMAT(commandes.date, '%d/%m/%Y') AS Date  FROM  $this->table  INNER JOIN commandes on historique.id_commande=commandes.id WHERE historique.id_user=?");
        $sth->execute(array($value));
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

}