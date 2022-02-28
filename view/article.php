<?php foreach($produit as $value):?>
    <p><?=$value['name'];?></p>
    <p><?=$value['price'];?>€</p>
<?php endforeach;?>

<form action="#" method="post">
    <input type="submit" value="Ajouter au panier" name="panier">
</form>

<h1>Descriptifs</h1>

<?php foreach($produit as $value): ?>
    <p><?=$value['short_descr'];?></p>
    <p><?=$value['long_descr'];?></p>
<?php endforeach;?>

<h1>Commentaires</h1>
<div class="commentaire">
    <?php foreach($comments as $value): ?>
        <p><?=$value['comment'];?></p>
        <p>Le <?=$value['date'];?></p>
        <!--<p><?=$value['user'];?></p>-->
        <p><?=$value['approuval'];?> étoile(s)</p>
        <hr>
    <?php endforeach;?>
</div>

<h2>Laisser un commentaire</h2>
<?php
    //if(isset($_SESSION['login'])){ 
        echo '<form action="#" method="post">
            <textarea name="commentaire" rows="5" cols="33" placeholder="Laisser un message..."></textarea>
            <br></br>
            <input type="checkbox" name="rating" value="1">
            <input type="checkbox" name="rating" value="2">
            <input type="checkbox" name="rating" value="3">
            <input type="checkbox" name="rating" value="4">
            <input type="checkbox" name="rating" value="5">
            <br></br>
            <input type="submit" value="Envoyer" name="valider">
        </form>';
    //}
    /*else{ ?>
        <a href="<?=path?>connexion"><p>Connecter vous pour laisser un commentaire</p></a>
    <?php }*/
?>