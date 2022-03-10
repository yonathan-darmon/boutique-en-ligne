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

    public function addProd($nom, $prix, $stock, $promo, $push, $short, $long, $tags)
    {
        $sth = $this -> _connexion->prepare('INSERT INTO products (name, price, date, stock, promo, mis_avant, short_descr, long_descr, tags) VALUES (?, ?, NOW, ?, ?, ?, ?, ?, ?)');
        $sth -> execute(array($nom, $prix, $stock, $promo, $push, $short, $long, $tags));
        //$add = $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function push()
    {
        $sth = $this -> _connexion->prepare('INSERT INTO products VALUES mis_avant = 1');
        $sth -> execute();
        $push = $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function stock()
    {
        $sth = $this -> _connexion->prepare('SELECT name, stock, FROM products');
        $sth->execute();
        $visu = $sth->fetchall(PDO::FETCH_ASSOC);
        return $visu;
    }
}