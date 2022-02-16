<?php
class utilisateursmodel extends Model{
    public function __construct()
    {
        $this->table = "user";
        $this->getConnection();
    }
}