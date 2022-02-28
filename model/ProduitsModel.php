<?php

class ProduitsModel extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }

    public function getProdBySc($value)
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  ' . $this->table . ' INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name= ?');
        $sth->execute(array($value));
        $products=$sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function getProdByDate()
    {
        $sth = $this -> _connexion -> prepare('SELECT * FROM' . $this -> table . 'ORDER BY DATE DESC LIMIT 4');
        $sth -> execute();
        $prodate = $sth -> fetchall(PDO::FETCH_ASSOC);
        return $prodate;
    }

    private function priceReduction($number, $total, $percent)
    {
        $sth = $this -> _connexion -> prepare('SELECT promo FROM' . $this -> table);
        $sth -> execute();
        $price = $sth -> fetchall(PDO::FETCH_ASSOC);
        $priceRed = $price - ($number/$total) * $percent;
        return ($priceRed);
    }
}