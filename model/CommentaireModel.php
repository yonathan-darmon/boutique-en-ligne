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
        $sth = $this->_connexion->prepare('INSERT INTO `comments`(comment,approuval,date,id_product,id_user) VALUES (?,?,NOW(),?,?)');
        $sth->execute(array($value));
    }

    public function select()
    {
        $sth = $this->_connexion->prepare('SELECT * FROM `comments` ORDER BY approuval DESC LIMIT 5');
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
}