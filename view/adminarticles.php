<?php

?>
<!-- Ajoute des articles -->
<form action="" method="POST">
    <label for="nom">Nom Produit</label>
    <input type="text" id="nom" name="nom" placeholder="Nom du produit" required>
    <label for="price">Prix du Produit</label>
    <input type="text" id="price" name="price" placeholder="Prix du produit" required>
    <label for="stock">Stock du produit</label>
    <input type="text" id="stock" name="stock" placeholder="Quantité à ajouter" required>
    <label for="promo">Pourcentage de promotion sur produit</label>
    <input type="text" id="promo" name="promo" placeholder="Promo" required>
    <label for="image">Image1</label>
    <input type="text" id="image" name="image" placeholder="Image" required>
    <label for="image2">Image2</label>
    <input type="text" id="image2" name="image2" placeholder="Image 2" required>
    <label for="image3">Image3</label>
    <input type="text" id="image3" name="image3" placeholder="Image 3" required>
    <label for="push">Produit Mis en avant</label>
    <input type="text" id="push" name="push" placeholder="Mis en avant" required>
    <label for="short">Courte description du Produit</label>
    <input type="text" id="short" name="short" placeholder="Description courte" required>
    <label for="long">Longue description du Produit</label>

    <input type="text" id="long" name="long" placeholder="Description longue" required>
    <label for="tags">Tags produits</label>

    <input type="text" id="tags" name="tags" placeholder="Ajouter des tags" required>
    <select name="cat">
        <?php foreach ($catego as $key => $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['name_categories'] ?></option>
        <?php endforeach; ?>
    </select>
    <select name="souscat">
        <?php foreach ($souscateg as $key => $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="ajouter" placeholder="Ajouter">
</form>

