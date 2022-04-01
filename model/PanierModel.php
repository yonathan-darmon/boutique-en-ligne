<?php

class PanierModel extends Model
{
    public function __construct()
    {
        $this->table = "cart";
        $this->getConnection();
    }

    public function insert($id_product, $price, $id_user)
    {
        $sth = $this->_connexion->prepare('INSERT INTO cart(id_product, price, quantity, date, id_user) VALUES (?,?,1, Now(),?)');
        $sth->execute(array($id_product, $price, $id_user));

    }

    public function delete($id_user)
    {
        $sth=$this->_connexion->prepare('DELETE FROM cart WHERE id_user=?');
        $sth->execute(array($id_user));
    }

    public function deletecart($id)
    {
        $sth = $this->_connexion->prepare('DELETE FROM cart WHERE id=?');
        $sth->execute(array($id));
    }

    public function total()
    {
        $sth = $this->_connexion->prepare('SELECT SUM(`price`)*quantity FROM ' . $this->table . ' ');
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getProdByPanier($id)
    {
        $sth=$this->_connexion->prepare('SELECT products.name,products.image,cart.price,cart.quantity,cart.id FROM products INNER JOIN cart ON cart.id_product=products.id WHERE cart.id_user=?');
        $sth->execute(array($id));
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
}