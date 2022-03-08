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
        $sth = $this->_connexion->prepare('SELECT products.* FROM  ' . $this->table . ' INNER JOIN categories ON products.id_categorie=categories.id WHERE categories.name_categories = ?');
        $sth->execute(array($value));
        $products = $sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function getProdBySc($value)
    {
        $sth = $this->_connexion->prepare('SELECT products.* FROM  ' . $this->table . ' INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name= ? LIMIT 6');
        $sth->execute(array($value));
        $products = $sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }


    public function getProdByDate()
    {
        $sth = $this->_connexion->prepare('SELECT * FROM ' . $this->table . ' ORDER BY DATE DESC LIMIT 6 ');
        $sth->execute();
        $prodate = $sth->fetchall(PDO::FETCH_ASSOC);
        return $prodate;
    }


}