<div class="panier">
    <?php
    var_dump($rabais);
        if(empty($panier)){
            echo '<p id="vide">votre panier est vide</p>';
        }
    ?>
<?php if(isset($panier)):?>
    <?php foreach($panier as $value):?>
    <div class="panier2">
        <img src="<?=path?>ASSET/images/<?=$value['image']?>" alt="">
        <h3>Nom</h3>
        <p><?=$value['name']?></p>
        <h3>Prix</h3>
        <p><?=$value['price'];?>€</p>
        <h3>Quantité</h3>
        <form method="post">
            <input type="number" name="quantity" value="<?=$value['quantity'];?>">
            <input type="hidden" name="id" value="<?=$value['id']?>">
            <input type="submit" name="modifquantity" value="ajouter">
        </form>
        <h3>Total</h3>
        <p><?=$value['price']*$value['quantity'];?>€</p>
    
        <form method="post">
            <input type="submit" name="supprimer" value="supprimer">
        </form>

    </div>
    <?php endforeach;?>
    <?php endif;?>
</div>
<div id="container1">
<div class="paiement">
        <h2>Total panier</h2>
    <?php if(!empty($panier)):?>

        <?php foreach($paniertotal as $value):?>
            <form method="post">
                <input type="text" name="prix" disabled="disabled" value="<?php
                $value = implode(',', $value);
                echo $value-($value*$rabais);
                ?>">€
                <br></br>
                <br></br>
            </form>
        <?php endforeach;?>
    <?php else:?>
        <?php foreach($paniertotal as $value):?>
            <form method="post">
                <input type="text" name="prix" disabled="disabled" value="<?php
                $value = implode(',', $value);
                echo $value;
                ?>">€
                <br></br>
                <br></br>
            </form>
        <?php endforeach;?>
    <?php endif;?>

</div>
        </div>
<body>
    <form  method="post">
        <div class="pay">
            <select name="paiment">
                <option>Moyen de paiement</option>
                <option>Carte bancaire</option>
                <option>Paypal</option>
            </select>
            <br></br>
            <div id="errors"></div><!--messages d'erreur de paiement-->
            <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
            <br></br>
            <div id="card-elements"></div><!--formulaire des informations de la carte-->
            <div id="card-errors" role="alert"></div><!--erreur pour la carte-->
            <br>
            <input id="card-button" type="submit" name="button" value="Proceder au paiement">
        </div>
    </form>

    <!--alert pour le paiement-->

    
</body>