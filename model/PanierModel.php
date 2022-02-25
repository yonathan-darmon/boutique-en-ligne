<?php
    class PanierModel extends Model
    {
        public function __construct()
        {
            $this->table="cart";
            $this->getConnection();
        }

        public function insert($value)
        {
            $sth = $this->_connexion->prepare('INSERT INTO `cart` (id_product,price,quantity,date,id_user) VALUES (?,?,1,?,?)');
            $sth->execute(array($value));
        }
    }
?>