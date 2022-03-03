<?php
class HistoriqueModel extends Model
{
    public function __construct()
    {
        $this->table="historique";
        $this->getConnection();
    }

}