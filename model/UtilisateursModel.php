<?php

class UtilisateursModel extends Model
{
    public function __construct()
    {
        $this->table = "user";
        $this->getConnection();
    }

    public function insert($value1, $value2, $value3, $value4) // Requète pour inscription
    {
        $sth = $this->_connexion->prepare('INSERT INTO `user`(login, password, email, adresse, id_reward, id_droit) VALUES (?,?,?,?,1,1)');
        $sth->execute(array($value1, $value2, $value3, $value4));
    }

    public function getSpecific($params, $id) // Récupère un paramètre spécifique de la table user
    {
        $sth = $this->_connexion->prepare("SELECT $params FROM $this->table WHERE id=$id");
        $sth->execute();
        return $sth->fetch();
    }

    public function getReward($value) // Requète pour rewards
    {
        $sth = $this->_connexion->prepare("SELECT reward.name FROM $this->table INNER JOIN reward ON reward.id=user.id_reward WHERE user.id=?");
        $sth->execute(array($value));
        return $sth->fetch();
    }


    public function updatePassword($value, $mail) // Requète utilise pour le mot de passe oublié
    {
        $sth = $this->_connexion->prepare('UPDATE `user` SET `password` = ? WHERE `email`= ?');
        $sth->execute(array($value,$mail));

    }

}