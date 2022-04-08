<div class="souscat">
    <div class="categorie"><a href="<?= path ?>produits/disney/1"><img src="<?= path ?>ASSET/images/Disney.png"
                                                                       alt="sous categorie Disney"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/harry_potter/1"><img src="<?= path ?>ASSET/images/HP.png"
                                                                             alt="sous categorie Harry Potter"></a>
    </div>
    <div class="categorie"><a href="<?= path ?>produits/marvel/1"><img src="<?= path ?>ASSET/images/Marvel.png"
                                                                       alt="sous categorie Marvel"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/starwars/1"><img src="<?= path ?>ASSET/images/Star Wars.png"
                                                                         alt="sous categorie Star wars"></a></div>
    <div class="categorie"><a href="<?= path ?>produits/dc/1"><img src="<?= path ?>ASSET/images/DC.png"
                                                                   alt="sous categorie DC Comics"></a></div>
</div>
<div class="box">
    <div class="research">
        <p id="pagin" class='hidden'><?= $_SERVER['REQUEST_URI']; ?></p>
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

    <div class="productlist">
        <h1 class="titre">Découvrez notre collection</h1>
        <div class="cards">
            <?php            foreach ($prod as $value): ?>
                <div class="card">
                    <div class="contener">
                        <a href="<?= path ?>article/<?= $value['id'] ?>"> <img
                                    src="<?= path ?>ASSET/images/<?= $value['image'] ?>" alt="">
                            <!-- <img src="<?= path ?>ASSET/images/<?= $value['image2'] ?>" alt="">
                            <img src="<?= path ?>ASSET/images/<?= $value['image3'] ?>" alt=""> -->
                            <h2><?= $value['name']; ?></h2>
                        </a>
                        <h3><?= $value['price']; ?> euros</h3>
                        <p class="short"><?= $value['short_descr'] ?></p>
                    </div>
                    <form action="#" method="post" name="pan">
                        <input type="hidden" name="hidden" value="<?= $value['id'] ?>">
                        <input type="submit" name="achat" value="acheter">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="page">
            <?php
            $params = explode('/', $_GET['p']);

            for ($i = 1; $i <= $nombreDePages; $i++): ?>
                <a id="pagination" href="<?= path ?>produits/<?php if (isset($params[1]) && !is_numeric($params[1])) {
                    echo $params[1] . '/' . $i;
                } else {
                    echo $i;
                } ?>"><?= $i ?></a>
            <?php endfor; ?>
            <a href="<?= path ?>produits"> Retour sur tout les produits</a>
        </div>
    </div>
    <!-- <h2 class="hidden">Résultats pour: <?= $_POST['input-search'] ?></h2> -->


    <?php if (isset($produit)): ?>
        <div class="popup">
            <h1>Vous avez ajouté ce produit au panier</h1>
            <h2><?= $produit[0]['name'] ?></h2>
            <a href="<?= path ?>panier">Aller au panier</a>
            <a href="<?= path ?>produits">Continuer vos achats</a>
        </div>
    <?php endif; ?>
    <?php if (!isset($params[1])): ?>
        <div class="search-box">

            <form method="POST" action="">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="input-search" name="input-search" placeholder="Rechercher un produit">
                <input type="submit" name="search" value="Chercher" class="btnSearch">
            </form>
        </div>
    <?php endif; ?>
</div>