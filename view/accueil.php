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
    <?php foreach ($produit as $value) :?>
    <p><?=$value['name'];?></p>
    <?=$price = $value['price'];?>
    <?php $reduc = ($value['price'] * $value['promo']) /100;?>
    <?=$priceRed = ($price - $reduc)?>
    <?php endforeach;?>
</div>

<div class="bloc1">
    <h1>Nos produits phares !</h1>
    <?php foreach($produit as $value):?>
    <?php if($value['mis_avant'] == 1) 
      {
        echo $value['name'];
        echo $value['price']. '€'; 
    }
      ?>
    <?php 
        if($value['promo'] != 0) 
        {
          $price = $value['price'];
          $reduc = ($value['price'] * $value['promo']) /100;
          $priceRed = ($price - $reduc);
          echo $priceRed;
        }
        ?>
    <?php endforeach;?>
</div>

<div class="bloc2">
    <h1>Nos derniers arrivages</h1>
    <?php foreach($produit as $value):?>
    <p><?=$value['name'];?></p>
    <p><?=$value['price'];?></p>
    <?php 
        if($value['promo'] != 0) 
        {
          $price = $value['price'];
          $reduc = ($value['price'] * $value['promo']) /100;
          $priceRed = ($price - $reduc);
          echo $priceRed;
        }
        ?>
    <?php endforeach;?>
</div>