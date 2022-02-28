<?php
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
            <input type="submit" name="choix" value="Filtrez">
        </form>

    </div>
    <div class="productlist">
        <?php foreach ($produits as $value): ?>
            <h2><a href="<?= path ?>article/<?= $value['id'] ?>"><?= $value['name']; ?></a></h2>
            <h3><?= $value['price']; ?> euros</h3>
            <button name="panier" value="achat">Achetez</button>

        <?php endforeach; ?>
    </div>
</div>