<?php
?>

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

<div class="bloc">
    <h1>Produits en promotion !</h1>
        <?php foreach ($promo as $value) :?>
          <div class="carte">
        <img src="<?= path ?>ASSET/images/<?=$value['image2']?>" alt=""><br>
        <h3><?=$value['name'];?></h3><br>
        <p>Prix:<?=$price = $value['price']?>€<br></p><br>
        <?php $reduc = ($value['price'] * $value['promo']) /100;?>
        <p>Prix réduit:<?= $priceRed = ($price - $reduc). '€';?></p>
    </div>
    <?php endforeach;?>
</div>
<div class="parallax-effect"></div>

<div class="bloc1">
    <h1>Nos produits phares !</h1>
    <?php foreach($avant as $value):?>
    <div class="carte">
        <img src="<?= path ?>ASSET/images/<?=$value['image2']?>" alt=""><br>
        <h3><?=$value['name'];?></h3><br>
        <p>Prix:<?=$price = $value['price']. '€'?></p><br><br>
        <?php $reduc = ($value['price'] * $value['promo']) /100;?>
        <?php 
        if($value['promo'] != 0 && $value['mis_avant'] == 1) 
        {
          $price = $value['price'];
          $reduc = ($value['price'] * $value['promo']) /100;
          $priceRed = ($price - $reduc). '€';
          echo '<p> Prix réduit:'.$priceRed. '</p>';
        }
        ?>
    </div>
    <?php endforeach;?>
</div>
<div class="parallax-effect1"></div>

<div class="bloc2">
    <h1>Nos derniers arrivages</h1>
    <?php foreach($produit as $value):?>
    <div class="carte">
        <img src="<?= path ?>ASSET/images/<?=$value['image2']?>" alt=""><br>
        <h3><?=$value['name'];?></h3><br>
        <p>Prix:<?=$value['price']. '€';?></p><br><br>
        <?php 
        if($value['promo'] != 0) 
        {
          $price = $value['price'];
          $reduc = ($value['price'] * $value['promo']) /100;
          $priceRed = ($price - $reduc);
          echo '<p> Prix réduit:'.$priceRed. '</p>';
        }
        ?>
    </div>
    <?php endforeach;?>
</div>
<div class="parallax-effect2">