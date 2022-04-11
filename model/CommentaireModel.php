<?php
class CommentaireModel extends Model
{
    public function __construct()
    {
        $this->table="comments"; // Connexion à la bdd
        $this->getConnection();
    }

    public function insert($comment, $approuval, $id_product, $id_user)
    {
        $sth = $this->_connexion->prepare('INSERT INTO `comments`(comment,approuval,date,id_product,id_user) VALUES (?,?,NOW(),?,?)');
        $sth->execute(array($comment, $approuval, $id_product, $id_user));
    }

    public function average($id)
    {
        $sth = $this->_connexion->prepare('SELECT AVG(`approuval`) FROM `comments` WHERE id_product= '.$id.' ' );
        $sth->execute(array());
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
}   