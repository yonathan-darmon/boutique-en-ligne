<?php
class DroitsModel extends Model{
    public function __construct()
    {
        $this->table="droits_user";
        $this->getConnection();
    }
}