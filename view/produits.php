<div class="box1">
    <div class="categorie"><a href="<?=path?>produits/disney">Disney</a></div>
    <div class="categorie"><a href="<?=path?>produits/harry_potter">Harry Potter</a></div>
    <div class="categorie"><a href="<?=path?>produits/marvel">Marvel</a></div>
    <div class="categorie"><a href="<?=path?>produits/sw">Star Wars</a></div>
    <div class="categorie"><a href="<?=path?>produits/dc">DC Universe</a></div>
</div>
<h1>Liste des produits</h1>
<?php foreach($produits as $value):?>
    <h2><a href="<?=path?>article/<?=$value['id']?>"><?= $value['name'];?></a></h2>
<h3><?= $value['price'];?> euros</h3>
    <button name="panier" value="achat">Achetez</button>

<?php endforeach;?>
