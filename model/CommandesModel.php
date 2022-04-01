<?php

class CommandesModel extends Model
{
    public function __construct()
    {
        $this->table = "commandes";
        $this->getConnection();
    }

    public function insert($achat, $price, $moyen_paiement, $id_user)
    {
        $sth = $this->_connexion->prepare("INSERT INTO commandes(achat, date, price, moyen_paiement, id_user) VALUES (?,NOW(),?,?,?)");
        $sth->execute(array($achat, $price, $moyen_paiement, $id_user));
    }

}

?>