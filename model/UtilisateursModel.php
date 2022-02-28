<?php

class UtilisateursModel extends Model
{
    public function __construct()
    {
        $this->table = "user";
        $this->getConnection();
    }

    public function update()
    {
        $sth = $this->_connexion->prepare("UPDATE $this->table SET login=?,password=?,email=?,adress=? WHERE id = $this->id");
        $sth->execute(array());
    }
    public function insert($value1,$value2,$value3,$value4)
    {
        $sth = $this->_connexion->prepare('INSERT INTO `user`(login, password, email, adress, id_reward) VALUES (?,?,?,?,1)');
        $sth->execute(array($value1,$value2,$value3,$value4));
    }
}