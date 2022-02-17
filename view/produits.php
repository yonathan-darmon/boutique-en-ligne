<div class="box1">
    <div class="categorie"><a href=<?=ROOT."produits/disney"?>>Disney</a></div>
    <div class="categorie"><a href="./harry_potter">Harry Potter</a></div>
    <div class="categorie"><a href="produits.php?cat=marvel">Marvel</a></div>
    <div class="categorie"><a href="produits.php?cat=sw">Star Wars</a></div>
    <div class="categorie"><a href="produits.php?cat=dc">DC Universe</a></div>
</div>
<h1>Liste des produits</h1>
<?php var_dump($produits);?>
<?php foreach($produits as $value):?>
    <h2><a href="produit.php?<?=$value['id']?>"><?= $value['name'];?></a></h2>
<h3><?= $value['price'];?> euros</h3>
<?php endforeach;?>
