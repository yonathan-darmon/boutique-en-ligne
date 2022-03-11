<div class="souscat">
    <div class="categorie"><a href="<?= path ?>produits/disney"><img src="<?= path ?>ASSET/images/Disney.png"
                                                                     alt="sous categorie Disney"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/harry_potter"><img src="<?= path ?>ASSET/images/HP.png"
                                                                           alt="sous categorie Harry Potter"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/marvel"><img src="<?= path ?>ASSET/images/Marvel.png"
                                                                     alt="sous categorie Marvel"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/starwars"><img src="<?= path ?>ASSET/images/Star Wars.png"
                                                                       alt="sous categorie Star wars"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/dc"><img src="<?= path ?>ASSET/images/DC.png"
                                                                 alt="sous categorie DC Comics"></a></div>
</div>
<h1>Découvrez notre collection</h1>
<div class="box">
    <div class="research">
        <form action="<?= path ?>produits/<?php if(isset($_POST['choix'])) {echo $_POST['filtre'];} ?>" name="select" method="post">
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
        header('Refresh:3; url=' . path . 'connexion');
    }
    var_dump($produits[0]['image']);
    ?>
    <?php if (!isset($produit)): ?>

        <div class="productlist">
            <?php foreach ($produits as $value):?>
                <div class="card">
                    <img src="<?=$value['image']?>" alt="">
                    <h2><a href="<?= path ?>article/<?= $value['id'] ?>"><?= $value['name']; ?></a></h2>
                    <h3><?= $value['price']; ?> euros</h3>
                    <form action="#" method="post" name="pan">
                        <input type="hidden" name="hidden" value="<?= $value['id'] ?>">
                        <input type="submit" name="achat" value="acheter">
                    </form>
                </div>
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
