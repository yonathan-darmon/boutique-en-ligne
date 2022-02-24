<?php
class CommentaireModel extends Model
{
    public function __construct()
    {
        $this->table="comments";
        $this->getConnection();
    }

    public function insert($value)
    {
        $sth = $this->_connexion->prepare('INSERT INTO `comments`(comment,approuval,date,id_product,id_user) VALUES (?,?,?,?,?)');
        $sth->execute(array($value));
    }
}