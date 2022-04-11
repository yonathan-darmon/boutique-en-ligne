<!-- Container avec le texte de présentation 
      et le carrousel 3D -->

<div id="cont">
    <div class="bloc-pres">
        <p>Depuis 2022, <br>Pop Cult(e)ure vous propose <br>la plus large gamme de figurines POP.<br>
            Retrouvez tous vos Héros favoris <br>sur notre boutique en ligne !
        </p>
    </div>
    <div class="container">
        <div class="carousel">
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
            <div class="carousel__face"></div>
        </div>
    </div>
</div>

<!-- Caché {display:none}, visible uniquement sur mobiles
      {max-width:767px} -->

<div class="resp">
    <img alt="" src="./ASSET/images/pop.gif" /> <!-- GIF -->
    <a href="<?= path ?>produits"><button>Voir nos articles</button></a> <!-- Bouton menant sur produits.php -->
</div>

<!-- Début des blocs qui contiennent les produits et leurs infos
      visible sur grand devices {min-width:1599px} -->

<div class="bloc"> <!-- 1er bloc -->
    <h1>Produits en promotion !</h1>
    <div class="sousbloc"> <!--Nécessaire pour le {display:grid} --> 
        <?php foreach ($promo as $value) : ?> <!-- Recherche les produits en promo en bdd -->
        <div class="carte"> <!-- Chaque produit est dans une carte -->
            <div class="cardimage">
                <a href="<?= path ?>article/<?= $value['id'] ?>"> <img
                        src="<?= path ?>ASSET/images/<?= $value['image2'] ?>" alt=""></a><br>
            </div>
            <div class="cardcontent">
                <h3><?= $value['name']; ?></h3><br>
                <p>Prix:<?= $price = $value['price'] ?>€<br></p><br>
                <?php $reduc = ($value['price'] * $value['promo']) / 100; ?> <!-- Calcul de la promotion -->
                <p>Prix réduit:<?= $priceRed = ($price - $reduc) . '€'; ?></p> <!-- Applique la promotion -->
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>
<div class="parallax-effect"></div> <!-- Génère l'effet parallax en CSS -->

<div class="bloc1"> <!-- 2eme bloc -->
    <h1>Nos produits phares !</h1>
    <div class="sousbloc">
        <?php foreach ($avant as $value): ?>
        <div class="carte">
            <div class="cardimage">
                <a href="<?= path ?>article/<?= $value['id'] ?>"><img
                        src="<?= path ?>ASSET/images/<?= $value['image2'] ?>" alt=""></a><br>
            </div>
            <div class="cardcontent">
                <h3><?= $value['name']; ?></h3><br>
                <p>Prix:<?= $price = $value['price'] . '€' ?></p><br><br>
                <?php $reduc = ($value['price'] * $value['promo']) / 100; ?>
                <?php
                if ($value['promo'] != 0 && $value['mis_avant'] == 1) {
                    $price = $value['price'];
                    $reduc = ($value['price'] * $value['promo']) / 100;
                    $priceRed = ($price - $reduc) . '€';
                    echo '<p> Prix réduit:' . $priceRed . '</p>';
                }
                ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="parallax-effect1"></div> <!-- Génère l'effet parallax en CSS -->

<div class="bloc2"> <!-- 3eme bloc -->
    <h1>Nos derniers arrivages</h1>
    <div class="sousbloc">
        <?php foreach ($produit as $value): ?>
        <div class="carte">
            <div class="cardimage">
                <a href="<?= path ?>article/<?= $value['id'] ?>"><img
                        src="<?= path ?>ASSET/images/<?= $value['image2'] ?>" alt=""></a><br>
            </div>
            <div class="cardcontent">
                <h3><?= $value['name']; ?></h3><br>
                <p>Prix:<?= $value['price'] . '€'; ?></p><br><br>
                <?php
            if ($value['promo'] != 0) {
                $price = $value['price'];
                $reduc = ($value['price'] * $value['promo']) / 100;
                $priceRed = ($price - $reduc);
                echo '<p> Prix réduit:' . $priceRed . '</p>';
            }
            ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="parallax-effect2">  <!-- Génère l'effet parallax en CSS -->