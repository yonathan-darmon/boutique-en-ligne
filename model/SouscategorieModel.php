<?php
class SouscategorieModel extends Model{
    public function __construct()
    {
        $this->table="sous_categories";
        $this->getConnection();
    }
}