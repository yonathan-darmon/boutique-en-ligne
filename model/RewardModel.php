<?php

class RewardModel extends Model{
    public function __construct()
    {
        $this->table="reward";
        $this->getConnection();
    }
}