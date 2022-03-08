<div class="box1" xmlns="http://www.w3.org/1999/html">
    <div class="categorie"><a href="<?= path ?>produits/disney">Disney</a></div>
    <div class="categorie"><a href="<?= path ?>produits/harry_potter">Harry Potter</a></div>
    <div class="categorie"><a href="<?= path ?>produits/marvel">Marvel</a></div>
    <div class="categorie"><a href="<?= path ?>produits/starwars">Star Wars</a></div>
    <div class="categorie"><a href="<?= path ?>produits/dc">DC Universe</a></div>
</div>
<h1>Découvrez notre collection</h1>
<div class="box">
    <div class="research">
        <form action="<?= path ?>produits/<?php if (isset($_POST['filtre'])) {
            echo $_POST['filtre'];
        } ?>" name="select" method="post">
            <select name="filtre" id="filtre">
                <?php foreach ($categorie as $value): ?>
                    <option value="<?= $value['name_categories']; ?>"><?= $value['name_categories']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="choix" value="filtrez">
        </form>

    </div>
    <?php if (isset($error1)) {
        echo $error1;
        header('Refresh:3; url='.path.'connexion');
    }

    ?>
    <?php if (!isset($produit)): ?>

        <div class="productlist">
            <?php foreach ($produits as $value): ?>
                <h2><a href="<?= path ?>article/<?= $value['id'] ?>"><?= $value['name']; ?></a></h2>
                <h3><?= $value['price']; ?> euros</h3>
                <form action="#" method="post" name="pan">
                    <input type="hidden" name="hidden" value="<?= $value['id'] ?>">
                    <input type="submit" name="achat" value="acheter">
                </form>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>

    <?php if (isset($produit)): ?>
        <div class="popup">
            <h1>Vous avez ajouter ce produit au panier</h1>
            <h2><?= $produit[0]['name'] ?></h2>
            <a href="<?= path ?>panier">Aller au panier</a>
            <a href="<?= path ?>produits">Continuer vos achats</a>
        </div>
    <?php endif; ?>

</div>


<?php
for ($i = 1; $i <= $pages; $i++): ?>
    <a href="<?= path ?>produits"><?= $i ?></a>&nbsp
<?php endfor; ?>
<?php
$params = explode('/', $_GET['p']);
if (isset($params[1])):?>
    <a href="<?= path ?>produits"> Retour sur tout les produits</a>
<?php endif; ?>
