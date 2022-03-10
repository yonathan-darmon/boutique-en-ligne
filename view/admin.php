<h1>Bienvenue sur La page Administration</h1>
<h3>Les dernieres news</h3>
<div class="boite1">
    <p class="inscrit">Nombre d'utilisateurs inscrit sur le site : <b> <?=$utilisateur?></b> </p>
    <p class="produitvendu"> Nombre de Produit vendu depuis la création du site :<b> <?=$produit?></b></p>
    <?php if (!empty($stocklow)):?>
    <p class="Alerte">Ces produits ont des stock faibles : </p>
    <ul>
        <?php foreach ($stocklow as $value):?>
        <li><?=$value['name']?></li>
        <?php endforeach;?>
    </ul>
    <?php endif;?>

</div>