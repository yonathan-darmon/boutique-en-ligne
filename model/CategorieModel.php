<?php
class CategorieModel extends Model{
    public function __construct()
    {
        $this->table="categories";
        $this->getConnection(); // Connexion à la bdd
    }

    public function addCat($nameC) //Ajour de catégorie
    {
        $sth = $this->_connexion->prepare('INSERT INTO categories (name_categories) VALUES (?)');
        $sth -> execute(array($nameC));
    }
}