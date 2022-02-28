<?php
var_dump($_POST);
?>
<div class="box1">
    <div class="categorie"><a href="<?= path ?>produits/disney">Disney</a></div>
    <div class="categorie"><a href="<?= path ?>produits/harry_potter">Harry Potter</a></div>
    <div class="categorie"><a href="<?= path ?>produits/marvel">Marvel</a></div>
    <div class="categorie"><a href="<?= path ?>produits/sw">Star Wars</a></div>
    <div class="categorie"><a href="<?= path ?>produits/dc">DC Universe</a></div>
</div>
<h1>Découvrez notre collection</h1>
<div class="box">
    <div class="research">
        <form action="<?= path ?>produits/<?php if(isset($_POST['filtre'])) {echo $_POST['filtre'];}?>" name="select" method="post">
            <select name="filtre" id="filtre">
                <?php foreach ($categorie as $value): ?>
                    <option value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="choix" value="filtrez">
        </form>

    </div>
    <div class="productlist">
        <?php foreach ($produits as $value): ?>
            <h2><a href="<?= path ?>article/<?= $value['id'] ?>"><?= $value['name']; ?></a></h2>
            <h3><?= $value['price']; ?> euros</h3>
            <form action="#" method="post" name="pan">
            <button name="panier" value="achat<?=$value['id']?>">Achetez</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>