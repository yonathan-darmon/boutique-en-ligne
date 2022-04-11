<?php

?>
<!-- Ajoute des articles -->
<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom du produit" required>
    <input type="text" name="price" placeholder="Prix du produit" required>
    <input type="text" name="stock" placeholder="Quantité à ajouter" required>
    <input type="text" name="promo" placeholder="Promo" required>
    <input type="text" name="image" placeholder="Image" required>
    <input type="text" name="push" placeholder="Mis en avant" required>
    <input type="text" name="short" placeholder="Description courte" required>
    <input type="text" name="long" placeholder="Description longue" required>
    <input type="text" name="tags" placeholder="Ajouter des tags" required>
    <select name="cat">
    <?php foreach ($catego as $key=>$value ): ?>
    <option value="<?=$value['id']?>"><?=$value['name_categories']?></option>
    <?php endforeach;?>
    </select>
    <select name="souscat">
    <?php foreach ($souscateg as $key=>$value ): ?>
        <option value="<?=$value['id']?>"><?=$value['name']?></option>
        <?php endforeach;?>
        </select>
    <input type="submit" name="ajouter" placeholder="Ajouter">
</form>

