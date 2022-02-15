<?php
class produitsmodel extends Model{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }
}