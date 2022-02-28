<?php

?>

<div class="bloc">
    <h1>Produits en promotion !</h1>
    <?php foreach ($produit as $value) :?>
        <p><?=$value['name'];?></p>
        <p><?=$value['price'];?>€</p>
        <?=$price = $value['price'];?>
        <?=$reduc = ($value['price'] * $value['promo']) /100;?>
        <? $priceRed = ($price - $reduc)?>
<?php endforeach;?>
    </div>


