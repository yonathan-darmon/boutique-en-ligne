<?php

class CommandesModel extends Model
{
    public function __construct()
    {
        $this->table = "commandes"; // Connexion à la bdd
        $this->getConnection();
    }

    public function insert($achat, $price, $moyen_paiement, $id_user) // Fonction d'ajout de commande à la table 
    {
        $sth = $this->_connexion->prepare("INSERT INTO commandes(achat, date, price, moyen_paiement, id_user) VALUES (?,NOW(),?,?,?)");
        $sth->execute(array($achat, $price, $moyen_paiement, $id_user));
    }

    public function getOrder($id) // Fonction pour historique
    {
        $sth=$this->_connexion->prepare('SELECT * FROM '.$this->table.' WHERE id_user='.$id.' ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

}

?>