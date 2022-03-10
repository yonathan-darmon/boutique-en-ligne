<div class="panier">
    <?php
        if(empty($panier)){
            echo '<p>votre panier est vide</p>';
        }
    ?>

    <?php foreach($panier as $value):?>
        <?php //var_dump($panier) ?>
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
    <?php endforeach;?>
</div>

<div class="paiement">
        <h2>Total panier</h2>
        <p>Total: <?=$value['price']*$value['quantity'];?>€</p>
       <?php
            if(!empty($panier['price'])){
                require_once('vendor/autload.php');
                $prix = $panier['price'];
                //on instancie stripe
                \Stripe\Stripe::setApiKey('sk_test_51Kb39iC5Di6WbNI4XF9KPchnOZOxF0x8XIIADxhzlGVgAoBL7oL9T0GUsyOO2fDaVWhOqDFjeo1bxHDuHc27XYP700BKvleeR3');
                $PaymentIntent = \Stripe\PaymentIntent::create([
                    'amount' => $prix*100,
                    'currency' => 'eur'
                ]);
            }
       ?>
</div>
<body>
    <form method="post">
        <div id="errors"></div><!--messages d'erreur de paiement-->
        <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
        <div id="card-elements"></div><!--formulaire des informations de la carte-->
        <div id="card-errors" role="alert"></div><!--erreur pour la carte-->
        <button id="card-button" type="button">Procéder au paiement</button>
    </form>

    
</body>