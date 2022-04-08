<?php foreach ($produit as $value): ?>
<!-- Recherche les produits -->
<div id="containe">
    <!-- Débuts du container contenant les 3 images leurs infos le bouton panier et le rating-->
    <div class="pics">
        <img src="<?=path?>/ASSET/images/<?= $value['image'] ?>" alt="">
        <img src="<?= path ?>ASSET/images/<?=$value['image2']?>" alt="">
        <img src="<?= path ?>ASSET/images/<?=$value['image3']?>" alt="">
    </div>
    <hr><hr>
    <div class="descr">
        <h1>Descriptifs</h1>
        <?php foreach ($produit as $value): ?>
        <p><span>Numéro du produit:</span><br> <?= $value['short_descr']; ?></p>
        <p><span>Description:</span><br> <?= $value['long_descr']; ?></p>
        <p><span>Stock: </span><br><?= $value['stock']; ?> pces</p>
        <?php endforeach; ?>
    </div>
    <div class="infos-prod">
        <p><?= $value['name']; ?></p>
        <p><?= $value['price']; ?>€</p>
    </div>
    <?php endforeach; ?>
    <div class="bouttonpanier">
        <form action="#" method="post">
            <input type="submit" value="Ajouter au panier" name="panier">
        </form>
    </div>
    <hr>
    <div class="rate">
        <p>Note moyenne des utilisateurs</p>
        <a href="#commentaire">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </a>
        <?php foreach ($commentsaverage as $value): ?> <!-- Note l'article -->
        <?php
        $value = implode(',', $value);
        echo $value;
        ?>
        <?php endforeach; ?>
    </div>
</div>
<div id="container2"> <!-- Début container 2 -->
    <div class="comm">
    <h1>Commentaires</h1>
    <div id="commentaire">
        <div class="commentaire">
            <?php
        if (empty($comments)) {
            echo '<p>Soyez le premier à donner votre avis</p>';
        }
        ?>

            <?php foreach ($comments as $value): ?>
            <p><?= $value['comment']; ?></p>
            <p> Le <?= $value['date']; ?></p>
            <p> Par <?= $value['login']; ?></p>
            <p><?= $value['approuval']; ?> étoile(s)</p>
            <hr>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Si user connecté affiche formulaire pour commentaires -->
    <?php
if (isset($_SESSION['id'])) {
    echo '<h2>Laisser un commentaire</h2>
    <form action="#" method="post">
                <textarea name="commentaire" rows="5" cols="33" placeholder="Laisser un message..."></textarea>
                <br>
                <p>Laisser nous une note</p>
                <select name="rating">
                    <option>Noter nous</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br></br>
                <input type="submit" value="Envoyer" name="valider">
            </form>';
}
else{ ?>
    <a href="<?=path?>connexion">
        <p>Connectez-vous pour laisser un commentaire</p>
    </a>
    <?php }
?>
</div>
</div>