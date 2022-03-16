<?php
class SouscategorieModel extends Model{
    public function __construct()
    {
        $this->table="sous_categories";
        $this->getConnection();
    }

    public function addSousCat($nameSC)
    {
        $sth = $this->_connexion->prepare('INSERT INTO sous_categories (name, id_categories) VALUES (?, ?)');
        $sth -> execute(array($nameSC));
    }
}