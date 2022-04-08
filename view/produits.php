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
<div class="box">
    <div class="research">
        <form action="" name="select" method="post">
            <select name="filtre" id="filtre">
                <?php foreach ($categorie as $value): ?>
                <option value="<?= $value['name_categories']; ?>"><?= $value['name_categories']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="choix" id="choix" value="Filtrez">
        </form>

    </div>
    <?php
    if (isset($error1)) {
        echo $error1;
        header('Refresh:3; url=' . path . 'connexion');
    }
    ?>
    <?php if (!isset($produit)): ?>

    <div class="productlist">
        <h1 class="titre">Découvrez notre collection</h1>
        <div class="cards">
            <?php foreach ($produits as $value): ?>
            <div class="card">
                <div class="contener">
                    <a href="<?= path ?>article/<?= $value['id'] ?>"> <img
                            src="<?= path ?>ASSET/images/<?= $value['image'] ?>" alt="">
                        <h2><?= $value['name']; ?></h2>
                    </a>
                    <h3><?= $value['price']; ?> €</h3>
                    <p class="short"><?=$value['short_descr']?></p>
                </div>
                <form action="#" method="post" name="pan">
                    <input type="hidden" name="hidden" value="<?= $value['id'] ?>">
                    <input type="submit" name="achat" value="Acheter">
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="page">
            <?php
                for ($i = 1; $i <= $pages; $i++): ?>
            <a href="<?= path ?>produits"><?= $i ?></a>&nbsp
            <?php endfor; ?>
            <?php
                $params = explode('/', $_GET['p']);
                if (isset($params[1])):?>
            <a href="<?= path ?>produits"> Retour sur tout les produits</a>
            <?php endif; ?>
        </div>
    </div>
    <!-- <h2 class="hidden">Résultats pour: <?= $_POST['input-search']?></h2> -->
    <?php endif; ?>

    <?php if (isset($produit)): ?>
    <div class="popup">
        <h1>Vous avez ajouté ce produit au panier</h1>
        <h2><?= $produit[0]['name'] ?></h2>
        <a href="<?= path ?>panier">Aller au panier</a>
        <a href="<?= path ?>produits">Continuer vos achats</a>
    </div>
    <?php endif; ?>


    <div class="search-box">
       
        <form method="POST" action="">
        <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="input-search" name="input-search" placeholder="Rechercher un produit">
            <input type="submit" name="search" value="Chercher" class="btnSearch">
        </form>
    </div>

</div>