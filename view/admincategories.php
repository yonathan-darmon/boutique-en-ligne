<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom de Catégorie" required>
    <input type="submit" name="add" value="Ajouter">
</form>

<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom de Sous-Catégorie" required>
    <select name="id_cat">
    <?php foreach ($catego as $key=>$value ): ?>
        <option value="<?=$value['id']?>"><?=$value['name_categories']?></option>
    <?php endforeach;?>
    </select>
    <input type="submit" name="add2" value="Ajouter">
</form>