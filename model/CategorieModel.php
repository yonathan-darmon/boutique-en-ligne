<?php
class CategorieModel extends Model{
    public function __construct()
    {
        $this->table="categories";
        $this->getConnection();
    }


}