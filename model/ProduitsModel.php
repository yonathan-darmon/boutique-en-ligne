<?php

class ProduitsModel extends Model
{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }

    public function getProdByCat($value) // Requète pour avoir un produit par catégorie
    {
        $sth = $this->_connexion->prepare('SELECT products.* FROM  ' . $this->table . ' INNER JOIN categories ON products.id_categorie=categories.id WHERE categories.name_categories = ? LIMIT 6 ');
        $sth->execute(array($value));
        $products = $sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function getProdBySc($value) // Requète pour avoir un produit par sous catégorie
    {
        $sth = $this->_connexion->prepare('SELECT products.* FROM  ' . $this->table . ' INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name= ? LIMIT 6');
        $sth->execute(array($value));
        $products = $sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function promoProd() // Requète pour afficher les produits en promo 
    {
        $sth = $this->_connexion -> prepare('SELECT * FROM products WHERE promo != 0');
        $sth -> execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function pushProd() // Requète pour avoir un produit mis en avant
    {
        $sth = $this->_connexion -> prepare('SELECT * FROM products WHERE mis_avant = 1');
        $sth -> execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getProdByDate() // Requète pour avoir un produit par date
    {
        $sth = $this->_connexion->prepare('SELECT * FROM ' . $this->table . ' ORDER BY DATE DESC LIMIT 5 ');
        $sth->execute();
        $prodate = $sth->fetchall(PDO::FETCH_ASSOC);
        return $prodate;
    }

    public function nombreTotalArticles() // Requète pour compter les produits pour la pagination
    {
        $sth = $this->_connexion->prepare('SELECT COUNT(*) AS nb_article FROM products');
        $sth->execute();
        return $sth->fetch();

    }

    public function nombreTotalArticleSC($sc) // Requète pour compter les produits par sous catégories pour la pagination
    {
        $sth = $this->_connexion->prepare('SELECT COUNT(*) FROM  ' . $this->table . ' INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name= ?');
        $sth->execute(array($sc));
        return $sth->fetch();

    }

    public function nombreTotalArticleCat($cat) // Requète pour compter les produits par catégories pour la pagination
    {
        $sth = $this->_connexion->prepare('SELECT COUNT(*) FROM  ' . $this->table . ' INNER JOIN categories ON products.id_categorie=categories.id WHERE categories.name_categories= ?');
        $sth->execute(array($cat));
        return $sth->fetch();


    }

    public function getArticleForProduct($limit, $articles) // Requète pour avoir les produits pour affichage
    {
        $sth = $this->_connexion->prepare('SELECT * FROM products  LIMIT ' . $limit . ',' . $articles);
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);

    }

    public function getArticleForProductSc($value,$limit,$articles) // Requète pour avoir les produits pour affichage par sous cat
    {
        $sth = $this->_connexion->prepare("SELECT products.* FROM products INNER JOIN sous_categories ON products.id_souscategorie=sous_categories.id WHERE sous_categories.name=? LIMIT $limit,$articles");
        $sth->execute(array($value));
        return $sth->fetchall(PDO::FETCH_ASSOC);

    }
    public function getArticleForProductCat($value,$limit,$articles) // Requète pour avoir les produits pour affichage par catégories
    {
        $sth = $this->_connexion->prepare("SELECT * FROM products INNER JOIN categories ON products.id_categorie=categories.id WHERE categories.name_categories=? LIMIT $limit,$articles");
        $sth->execute(array($value));
        return $sth->fetchall(PDO::FETCH_ASSOC);

    }
    public function addProd($nom, $prix, $stock, $promo, $image, $push, $short, $long, $tags, $cat, $sousCat) // Requète pour ajouter des produits
    {
        $sth = $this->_connexion->prepare('INSERT INTO products (name, price, date, stock, promo, image, mis_avant, short_descr, long_descr, tags, id_categorie, id_souscategorie) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $sth->execute(array($nom, $prix, $stock, $promo, $image, $push, $short, $long, $tags, $cat, $sousCat));
    }

    public function stock() // Requète pour afficher les stocks
    {
        $sth = $this->_connexion->prepare('SELECT id, name, stock FROM products');
        $sth->execute();
        $visu = $sth->fetchall(PDO::FETCH_ASSOC);
        return $visu;
    }

    public function upstock($params, $value) // Requète pour update un produit
    {
        $sth = $this->_connexion->prepare('UPDATE products SET stock= stock + ' . $value . ' WHERE id=?');
        $sth->execute(array($params));
        $up = $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getLowStock() // Requète pour afficher les stocks bas
    {
        $sth = $this->_connexion->prepare('SELECT name FROM ' . $this->table . ' WHERE stock <=10');
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function totalPageSearch($value) // Requète pour la pagination
    {
        $sth = $this->_connexion->prepare('SELECT COUNT(*) FROM products WHERE tags LIKE "%' . $value .'%"');
        $sth->execute();
        return$sth->fetch();
    }

    public function searchBar($value) // Requète pour la barre de recherche
    {
        $sth = $this->_connexion->prepare("SELECT * FROM products WHERE tags LIKE '%" . $value . "%' LIMIT 6");
        $sth->execute();
        $test = $sth->fetchall(PDO::FETCH_ASSOC);
        return ($test);
    }
}