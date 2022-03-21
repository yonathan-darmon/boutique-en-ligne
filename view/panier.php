<div class="panier">
    <?php
        if(empty($panier)){
            echo '<p>votre panier est vide</p>';
        }
    ?>

    <?php foreach($panier as $value):?>
        <?php //var_dump($panier) ?>
    <div class="panier2">
        <img src="<?=path?>ASSET/images/<?=$value['image']?>" alt="">
        <h3>Nom</h3>
        <p><?=$value['name']?></p>
        <h3>Prix</h3>
        <p><?=$value['price'];?>€</p>
        <h3>Quantité</h3>
        <form method="post">
            <input type="number" name="quantity" value="<?=$value['quantity'];?>">
            <input type="submit" name="modifquantity" value="ajouter">
        </form>
        <h3>Total</h3>
        <p><?=$value['price']*$value['quantity'];?>€</p>
        <form method="post">
            <input type="submit" name="supprimer" value="supprimer">
        </form>
    </div>
    <?php endforeach;?>
</div>

<div class="paiement">
        <h2>Total panier</h2>
        <!--<p>Total: <?=$value['price']*$value['quantity'];?>€</p>-->
        <?php foreach($paniertotal as $value):?>
            <form method="post">
                <input type="text" name="prix" disabled="disabled" value="<?php
                $value = implode(',', $value);
                echo $value;
                ?>">€
            </form>
        <?php endforeach;?>
      
</div>

<body>
    <form method="post">
        <div id="errors"></div><!--messages d'erreur de paiement-->
        <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
        <br></br>
        <div id="card-elements"></div><!--formulaire des informations de la carte-->
        <div id="card-errors" role="alert"></div><!--erreur pour la carte-->
        <br>
        <input id="card-button" type="submit" name="button" value="Proceder au paiement">
    </form>

    
</body>