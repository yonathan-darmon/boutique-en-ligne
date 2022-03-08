<?php foreach($panier as $value):?>
    <?php //var_dump($panier) ?>
    <h3>Prix</h3>
    <p><?=$value['price'];?>€</p>
    <h3>Quantité</h3>
    <p><?=$value['quantity'];?></p>
    <h3>Total</h3>
    <p><?=$value['price']*$value['quantity'];?>€</p>
<?php endforeach;?>

<div class="paiement">
    <h2>Total panier</h2>
    <p>Total: <?=$value['price']*$value['quantity'];?>€</p>
</div>