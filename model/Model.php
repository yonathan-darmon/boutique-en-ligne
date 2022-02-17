<?php

class Model
{
    //inof de BDD
    private $host = "localhost";
    private $db_name = "boutique_en_ligne";
    private $login = "root";
    private $password = "";

    //propriété de la connexion
    protected $_connexion = null;

    //proprieté des requetes

    public $table;
    public $id;

    public function getConnection()
    {
        if ($this->_connexion === null) {
            try {
                $this->_connexion = new PDO('mysql: host=' . $this->host . ';
            dbname=' . $this->db_name, $this->login, $this->password);
            } catch (PDOException $exception) {
                echo 'Erreur :' . $exception->getMessage();
            }
        }
        return$this->_connexion;
    }

    public function getALL()
    {
        $sth = $this->_connexion->prepare('SELECT * FROM ' . $this->table);
        $sth->execute();

        return $sth->fetchall(PDO::FETCH_ASSOC);
    }

    public function getOne($key, $value)
    {
        $sth = $this->_connexion->prepare('SELECT * FROM  '.$this->table.'  WHERE '.$key.' = ?' );
        $sth->execute(array($value));
        return $sth->fetch();
    }


}