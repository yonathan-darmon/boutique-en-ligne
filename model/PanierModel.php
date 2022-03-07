<?php

class PanierModel extends Model
{
    public function __construct()
    {
        $this->table = "cart";
        $this->getConnection();
    }

    public function insert($id_product,$price, $id_user)
    {
        $sth=$this->_connexion->prepare('INSERT INTO cart(id_product, price, quantity, date, id_user) VALUES (?,?,1, Now(),?)');
        $sth->execute(array($id_product,$price,$id_user));

    }
}