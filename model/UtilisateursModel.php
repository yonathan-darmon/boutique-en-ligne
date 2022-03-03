<?php

class UtilisateursModel extends Model
{
    public function __construct()
    {
        $this->table = "user";
        $this->getConnection();
    }
    public function insert($value1,$value2,$value3,$value4)
    {
        $sth = $this->_connexion->prepare('INSERT INTO `user`(login, password, email, adress, id_reward) VALUES (?,?,?,?,1)');
        $sth->execute(array($value1,$value2,$value3,$value4));
    }

    public function getSpecific($params,$id)
    {
        $sth=$this->_connexion->prepare("SELECT $params FROM $this->table WHERE id=$id");
        $sth->execute();
        return $sth->fetch();
    }
}