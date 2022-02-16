<?php

class utilisateursmodel extends Model
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
}