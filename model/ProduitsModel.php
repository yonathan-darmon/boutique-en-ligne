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
        $sth = $this->_connexion->prepare('SELECT products.* FROM  ' . $this->table . ' INNER JOIN categories ON products.id_categorie=categories.id WHERE categories.name_categories = ? LIMIT 6');
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

    public function addProd($nom, $prix, $stock, $promo, $image, $push, $short, $long, $tags, $cat, $sousCat)
    {
        $sth = $this -> _connexion->prepare('INSERT INTO products (name, price, date, stock, promo, image, mis_avant, short_descr, long_descr, tags, id_categorie, id_souscategorie) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $sth -> execute(array($nom, $prix, $stock, $promo, $image, $push, $short, $long, $tags, $cat, $sousCat));
    }

    public function stock()
    {
        $sth = $this -> _connexion->prepare('SELECT id, name, stock FROM products');
        $sth->execute();
        $visu = $sth->fetchall(PDO::FETCH_ASSOC);
        return $visu;
    }

    public function upstock($params, $value)
    {
        $sth = $this -> _connexion->prepare('UPDATE products SET stock= stock + '.$value.' WHERE id=?');
        $sth -> execute(array($params));
        $up = $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getLowStock()
    {
        $sth=$this->_connexion->prepare('SELECT name FROM '.$this->table.' WHERE stock <=10');
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function searchBar($value)
    {
        $sth = $this-> _connexion->prepare("SELECT * FROM products WHERE tags LIKE '%".$value."%'");
        $sth -> execute();
        $test = $sth->fetchall(PDO::FETCH_ASSOC);
        return($test);
    }
}