<?php
class ProduitsModel extends Model{
    public function __construct()
    {
        $this->table = "products";
        $this->getConnection();
    }
}