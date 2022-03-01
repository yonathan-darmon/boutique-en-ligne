<?php

?>

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
      <?php endforeach;?>
    </div>

    <div class="bloc2">
    <h1>Nos top ventes !</h1>
    <?php foreach($produit as $value):?>
        <?php if($value['stock'] <= 3) 
      {
        echo $value['name'];
        echo $value['price']. '€'; 
        echo $value['stock']. 'pce';
    }
      ?>
      <?php endforeach;?>
    </div>

    <div class="bloc3">
    <h1>Nos derniers arrivages</h1>
    <?php foreach($produit2 as $value):?>
        <p><?=$value['name'];?></p>
        <p><?=$value['price'];?></p>
        <?php endforeach;?>
    </div>
