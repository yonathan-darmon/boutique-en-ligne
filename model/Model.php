<?php

class Model
{
    //info de BDD
    private $host = "localhost";
    private $db_name = "boutique_en_ligne";
    private $login = "root";
    private $password = "";

    //propriété de la connexion
    protected $_connexion = null;

    //proprieté des requetes

    public $table;
    public $id;

    public function getConnection() //vérifie connection en bdd
    {
        if ($this->_connexion === null) {
            try {
                $this->_connexion = new PDO('mysql: host=' . $this->host . ';
            dbname=' . $this->db_name, $this->login, $this->password);
            } catch (PDOException $exception) {
                echo 'Erreur :' . $exception->getMessage();
            }
        }
        return $this->_connexion;
    }

    public function getALL() // Récupère tous les produits
    {
        $sth = $this->_connexion->prepare('SELECT * FROM ' . $this->table);
        $sth->execute();

        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getOne($key, $value) // Récupère un seul produit
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  ' . $this->table . '  WHERE ' . $key . ' = ?');
        $sth->execute(array($value));
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getInnerJoin($table2, $categories, $categories2, $key, $value)
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  ' . $this->table . ' INNER JOIN ' . $table2 . ' ON ' . $this->table . '.' . $categories . '=' . $table2 . '.' . $categories2 . ' WHERE ' . $key . '= ? LIMIT 6');
        $sth->execute(array($value));
        $products = $sth->fetchall(PDO::FETCH_ASSOC);
        return $products;

    }

    public function update($params, $value, $id) //Ajout de catégroie & stock
    {
        $sth = $this->_connexion->prepare("UPDATE $this->table SET $params=? WHERE id=$id ");
        $sth->execute(array($value));
    }

    public function deleteId($params,$id) // Supprime user
    {
        $sth=$this->_connexion->prepare('DELETE FROM'.$this->table.' WHERE'. $params.'='.$id);
        $sth->execute();

    }

}
