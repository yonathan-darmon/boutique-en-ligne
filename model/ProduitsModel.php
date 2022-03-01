<?php

class ProduitsModel extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }
    public function getProdByCat($value)
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  ' . $this->table . ' INNER JOIN categories ON products.id_categories=categories.id WHERE categories.name= ?');
        $sth->execute(array($value));
        $products=$sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function getProdBySc($value)
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  ' . $this->table . ' INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name= ?');
        $sth->execute(array($value));
        $products=$sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function getProd()
    {
        $sth = $this -> _connexion ->prepare('SELECT * FROM ' . $this -> table);
        $sth ->execute();
        $prodgen = $sth -> fetchall(PDO::FETCH_ASSOC);
        return $prodgen;
    }

    public function getProdByDate()
    {
        $sth = $this -> _connexion ->prepare('SELECT * FROM ' . $this -> table. 'ORDER BY DATE DESC BETWEEN DATEADD(DAY,GETDATE()) AND DATEADD(DAY,3,GETDATE()) ');
        $sth ->execute();
        $prodate = $sth -> fetchall(PDO::FETCH_ASSOC);
        return $prodate;
    }

}