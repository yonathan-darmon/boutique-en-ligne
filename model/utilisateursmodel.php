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
        $sth = $this->_connexion->prepare("");
        $sth->execute(array());
    }
}